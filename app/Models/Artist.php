<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'date_of_birth' => 'date',
    ];

    protected $fillable = [
        'name',
        'picture',
        'date_of_birth',
        'comments',
    ];

    public function artworks(){
        return $this->hasMany(Artwork::class)->with('artworkable');
    }

    public function artworkable(): MorphTo
    {
        return $this->morphTo();
    }
}
