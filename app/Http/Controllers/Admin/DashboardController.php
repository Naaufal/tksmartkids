<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryPhoto;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        $totalPhotos = GalleryPhoto::count();
        $totalCategories = GalleryCategory::count();

        // Pass Google Analytics ID and details to dashboard view
        $gaId = config('services.google_analytics.id');

        return view('admin.dashboard', compact('totalPhotos', 'totalCategories', 'gaId'));
    }
}
