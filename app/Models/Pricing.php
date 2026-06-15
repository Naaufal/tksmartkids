<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pricing extends Model
{
    protected $table = 'pricing';

    const CREATED_AT = null;

    protected $fillable = [
        'label',
        'amount',
        'description',
        'display_order',
        'updated_by',
        'updated_at',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'display_order' => 'integer',
    ];

    public function updater(): BelongsTo
    {
        return $this->belongsTo(UserProfile::class, 'updated_by');
    }
}
