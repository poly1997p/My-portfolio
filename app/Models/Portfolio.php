<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'gallery_images',
        'portfolio_name',
        'live_link',
        'description',
    ];

    protected $casts = [
        'gallery_images' => 'array',
    ];

    public function overviews()
    {
        return $this->hasMany(ProjectOverview::class);
    }
}
