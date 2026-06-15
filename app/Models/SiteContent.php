<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SiteContent extends Model
{
    protected $table = 'site_contents';

    const CREATED_AT = null;

    protected $fillable = [
        'key',
        'value',
        'page',
        'updated_by',
        'updated_at',
    ];

    public function updater(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'updated_by');
    }
}
