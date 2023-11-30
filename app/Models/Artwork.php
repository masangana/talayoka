<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artwork extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'artworkable_id',
        'artworkable_type',
        'artist_id',
    ];

    public function artworkable(){
        return $this->morphTo();
    }
}
