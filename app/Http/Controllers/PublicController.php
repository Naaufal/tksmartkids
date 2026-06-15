<?php

namespace App\Http\Controllers;

use App\Models\GalleryCategory;
use App\Models\GalleryPhoto;
use App\Models\Pricing;
use App\Models\SiteContent;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Retrieve all site contents as an associative array.
     */
    protected function getSiteContents(): array
    {
        return SiteContent::pluck('value', 'key')->all();
    }

    public function home()
    {
        $contents = $this->getSiteContents();
        
        // Fetch 6 most recent gallery photos
        $photos = GalleryPhoto::with('categories')
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();

        return view('public.home', compact('contents', 'photos'));
    }

    public function about()
    {
        $contents = $this->getSiteContents();
        return view('public.about', compact('contents'));
    }

    public function fasilitas()
    {
        $contents = $this->getSiteContents();
        return view('public.fasilitas', compact('contents'));
    }

    public function gallery()
    {
        $contents = $this->getSiteContents();
        
        // Fetch all categories and photos
        $categories = GalleryCategory::all();
        $photos = GalleryPhoto::with('categories')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('public.gallery', compact('contents', 'categories', 'photos'));
    }

    public function pricingContact()
    {
        $contents = $this->getSiteContents();
        
        // Fetch pricing elements ordered by display_order
        $pricings = Pricing::orderBy('display_order', 'asc')->get();

        return view('public.pricing', compact('contents', 'pricings'));
    }
}
