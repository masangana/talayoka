<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ArtworkInfo;

class Series extends Model
{
    use HasFactory;

    private $fillable = [
        'title',
        'slug',
        'description',
        'category_id'
    ];

    public function artworkInfo(){
        return $this->morphTo(ArtworkInfo::class, 'artworkable');
        //return $this->belongsTo(ArtworkInfo::class);
    }
}
