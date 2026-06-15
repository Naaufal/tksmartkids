<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GalleryCategory extends Model
{
    protected $table = 'gallery_categories';

    protected $fillable = [
        'name',
        'slug',
    ];

    public function photos(): BelongsToMany
    {
        return $this->belongsToMany(GalleryPhoto::class, 'gallery_photo_categories', 'category_id', 'photo_id');
    }
}
