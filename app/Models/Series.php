<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArtworkInfo;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id'
    ];

    public function seasons(){
        return $this->hasMany(Season::class)-> with('episodes')
         ->orderBy('created_at', 'DESC');
    }

    public function artworkInfo(){
        return $this->morphOne(ArtworkInfo::class, 'artworkable');
        //return $this->belongsTo(ArtworkInfo::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
