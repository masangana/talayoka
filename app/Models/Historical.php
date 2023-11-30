<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historical extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'historicable_type',
        'historicable_id'
    ];

    public function historicable(){
        return $this->morphTo()->with('artworkInfo');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
