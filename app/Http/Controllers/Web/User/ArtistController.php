<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index() {
        $artists = Artist::orderBy('name', 'asc')->paginate(18);

        return view('user.artist.index',[
            'artists' => $artists
        ]);
    }

    public function show($id){
        $artist = Artist::with('artworks')-> findOrFail($id);

        return view('user.artist.show',[
            'artist' => $artist
        ]);
    }
}
