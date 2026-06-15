<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GalleryPhoto extends Model
{
    protected $table = 'gallery_photos';

    const UPDATED_AT = null;

    protected $fillable = [
        'filename',
        'storage_path',
        'public_url',
        'alt_text',
        'uploaded_by',
        'created_at',
    ];

    public function uploader(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'uploaded_by');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(GalleryCategory::class, 'gallery_photo_categories', 'photo_id', 'category_id');
    }
}
