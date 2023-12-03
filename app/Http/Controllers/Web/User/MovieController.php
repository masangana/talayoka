<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Historical;
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
        $movie = Movie::with('category', 'artworkInfo', 'artists')->where('slug', $slug)->firstOrFail();
        if(auth()->user()){
            $historical = Historical::where('user_id', auth()->user()->id)->where('historicable_id', $movie->id)->where('historicable_type', 'App\Models\Movie')->first();
            if($historical == null){
                Historical::create([
                    'user_id' => auth()->user()->id,
                    'historicable_type' => 'App\Models\Movie',
                    'historicable_id' => $movie->id
                ]);
            }   
        }
        return view('user.movie.show', [
            'title' => $movie->title,
            'movie' => $movie,
        ]);
    }
}
