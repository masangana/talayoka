<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtworkInfo extends Model
{
    use HasFactory;

    protected $casts = [
        'production_date' => 'date',
    ];

    protected $fillable = [
        'artworkable_type',
        'artworkable_id',
        'trailler',
        'director',
        'production_date',
        'cover'
    ];

    public function artworkable(){
        return $this->morphTo();
    }
    //public function art
}
