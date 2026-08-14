<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PlatformStep extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'step_number',
        'title',
        'description',
        'icon',
    ];

    public array $translatable = ['title', 'description'];

    protected $casts = [
        'step_number' => 'integer',
    ];
}
