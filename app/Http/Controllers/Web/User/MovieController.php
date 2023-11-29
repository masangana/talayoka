<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        return view('user.movie.index', [
            'title' => "Liste des films",
            'movies' => Movie:: with('category', 'artworkInfo')->latest()->paginate(12),
        ]);
    }

    public function showMovie($slug){
        $movie = Movie::with('category', 'artworkInfo')->where('slug', $slug)->firstOrFail();
        return view('user.movie.show', [
            'title' => $movie->title,
            'movie' => $movie,
        ]);
    }
}
