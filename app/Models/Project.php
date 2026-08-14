<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'client_name',
        'category',
        'title',
        'description',
        'points',
        'tags',
        'image_path',
        'icon',
        'is_featured',
        'sort_order',
        'is_active',
    ];

    public array $translatable = ['category', 'title', 'description'];

    protected $casts = [
        'points' => 'array',
        'tags' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
