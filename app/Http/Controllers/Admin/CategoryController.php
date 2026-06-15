<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories with photo counts.
     */
    public function index()
    {
        $categories = GalleryCategory::withCount('photos')
            ->orderBy('name', 'asc')
            ->get();

        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created category in database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:gallery_categories,name',
        ], [
            'name.required' => 'Nama kategori harus diisi.',
            'name.unique' => 'Nama kategori sudah digunakan.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 100 karakter.',
        ]);

        $slug = Str::slug($request->name);

        // Ensure uniqueness of slug
        $originalSlug = $slug;
        $count = 1;
        while (GalleryCategory::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        GalleryCategory::create([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Kategori baru berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(GalleryCategory $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified category in database.
     */
    public function update(Request $request, GalleryCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:gallery_categories,name,' . $category->id,
        ], [
            'name.required' => 'Nama kategori harus diisi.',
            'name.unique' => 'Nama kategori sudah digunakan.',
            'name.max' => 'Nama kategori tidak boleh lebih dari 100 karakter.',
        ]);

        $slug = Str::slug($request->name);

        // Ensure uniqueness of slug excluding current category
        $originalSlug = $slug;
        $count = 1;
        while (GalleryCategory::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
        ]);

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified category from database.
     */
    public function destroy(GalleryCategory $category)
    {
        // Delete category. Because of cascade delete foreign key on the pivot, 
        // the pivot records in gallery_photo_categories are automatically deleted.
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
