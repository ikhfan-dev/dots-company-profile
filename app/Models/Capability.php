<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Capability extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'badge',
        'title',
        'description',
        'icon',
        'sort_order',
        'is_active',
    ];

    public array $translatable = ['badge', 'title', 'description'];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
