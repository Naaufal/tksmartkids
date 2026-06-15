<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the gallery photos.
     */
    public function index()
    {
        $photos = GalleryPhoto::with(['categories', 'uploader'])
            ->orderBy('created_at', 'desc')
            ->get();
        
        $categories = GalleryCategory::orderBy('name', 'asc')->get();

        return view('admin.gallery.index', compact('photos', 'categories'));
    }

    /**
     * Show the form for uploading a new photo.
     */
    public function uploadForm()
    {
        $categories = GalleryCategory::orderBy('name', 'asc')->get();
        return view('admin.gallery.upload', compact('categories'));
    }

    /**
     * Upload a new photo to Supabase Storage and save to database.
     */
    public function upload(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,webp|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:gallery_categories,id',
        ], [
            'photo.required' => 'File foto harus dipilih.',
            'photo.image' => 'File harus berupa gambar.',
            'photo.mimes' => 'Format foto harus JPG, PNG, atau WEBP.',
            'photo.max' => 'Ukuran foto maksimal adalah 2MB.',
        ]);

        $file = $request->file('photo');
        $filename = $file->getClientOriginalName();
        $cleanFilename = Str::slug(pathinfo($filename, PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
        $storagePath = 'photos/' . $cleanFilename;

        $supabaseUrl = config('supabase.url');
        $bucket = config('supabase.storage_bucket');
        $serviceKey = config('supabase.service_role_key');

        $uploadUrl = "{$supabaseUrl}/storage/v1/object/{$bucket}/{$storagePath}";

        try {
            // Upload to Supabase Storage using raw binary data
            $response = Http::withoutVerifying()->withHeaders([
                'Authorization' => "Bearer {$serviceKey}",
                'apikey' => $serviceKey,
                'Content-Type' => $file->getMimeType(),
            ])->withBody(file_get_contents($file->getRealPath()), $file->getMimeType())
              ->post($uploadUrl);

            if ($response->failed()) {
                $errorMsg = $response->json()['message'] ?? 'Gagal mengunggah ke Supabase Storage.';
                return back()->withErrors(['photo' => $errorMsg])->withInput();
            }

            // Generate public URL
            $publicUrl = "{$supabaseUrl}/storage/v1/object/public/{$bucket}/{$storagePath}";

            // Save to Database
            $adminProfile = $request->get('admin_profile');
            $photo = GalleryPhoto::create([
                'filename' => $filename,
                'storage_path' => $storagePath,
                'public_url' => $publicUrl,
                'alt_text' => $request->alt_text,
                'uploaded_by' => $adminProfile ? $adminProfile->id : null,
                'created_at' => now(),
            ]);

            // Sync categories if selected
            if ($request->filled('categories')) {
                $photo->categories()->sync($request->categories);
            }

            return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil diunggah.');

        } catch (\Exception $e) {
            return back()->withErrors(['photo' => 'Terjadi kesalahan sistem saat mengunggah: ' . $e->getMessage()])->withInput();
        }
    }

    /**
     * Delete a photo from Supabase Storage and Database.
     */
    public function delete(Request $request, GalleryPhoto $photo)
    {
        $supabaseUrl = config('supabase.url');
        $bucket = config('supabase.storage_bucket');
        $serviceKey = config('supabase.service_role_key');
        $storagePath = $photo->storage_path;

        $deleteUrl = "{$supabaseUrl}/storage/v1/object/{$bucket}/{$storagePath}";

        try {
            // Delete from Supabase Storage via HTTP
            $response = Http::withoutVerifying()->withHeaders([
                'Authorization' => "Bearer {$serviceKey}",
                'apikey' => $serviceKey,
            ])->delete($deleteUrl);

            // Note: Even if storage deletion fails (e.g. file already deleted or not found),
            // we should still clean up the database record to avoid broken links,
            // but we can log or handle if necessary.
            
            // Delete record (associated pivot table entries will cascade delete automatically due to constraint)
            $photo->delete();

            return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus.');

        } catch (\Exception $e) {
            return back()->with('error', 'Gagal menghapus foto: ' . $e->getMessage());
        }
    }

    /**
     * Assign categories to an existing photo.
     */
    public function assignCategory(Request $request, GalleryPhoto $photo)
    {
        $request->validate([
            'categories' => 'nullable|array',
            'categories.*' => 'exists:gallery_categories,id',
        ]);

        $photo->categories()->sync($request->categories ?? []);

        return redirect()->route('admin.gallery.index')->with('success', 'Kategori foto berhasil diperbarui.');
    }
}
