<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'season_id',
        'comment',
        'video_link',
    ];

    public function season(){
        return $this->belongsTo(Season::class)->with('series');
    }

}
