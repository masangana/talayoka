<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'slug',
        'description',
        'category_id',
        'video_link',
    ];

    public function artworkInfo(){
        return $this->morphOne(ArtworkInfo::class, 'artworkable');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
