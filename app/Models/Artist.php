<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'picture',
        'date_of_birth',
        'comments',
    ];

    public function artwork(){
        return $this->hasMany(Artwork::class);
    }
}
