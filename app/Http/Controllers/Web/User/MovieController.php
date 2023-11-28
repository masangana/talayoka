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
            'movies' => Movie:: with('category', 'artworkInfo')->latest()->get(),
        ]);
    }

    public function show($slug){
        $movie = Movie::with('category', 'artworkInfo')->where('slug', $slug)->firstOrFail();
        //$movie = Movie::with('category', 'artworkInfo')->findOrFail($id);
        return view('user.movie.show', [
            'title' => $movie->title,
            'movie' => $movie,
        ]);
    }
}
