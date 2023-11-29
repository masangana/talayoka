<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    public function index(){
        return view('user.serie.index', [
            'title' => "Liste des series",
            'series' => Series:: with('category', 'artworkInfo')->latest()->paginate(12),
        ]);
    }
    
    public function show($slug){
        $serie = Series::with('category', 'artworkInfo', 'seasons')->where('slug', $slug)->firstOrFail();

        return view('user.serie.show', [
            'title' => $serie->title,
            'serie' => $serie,
            'seasons' => $serie->seasons,
            'episodeView' => null,
        ]);
    }

    public function showEpisode($slug, $title, $id){
        $serie = Series::with('category', 'artworkInfo', 'seasons')->where('slug', $slug)->firstOrFail();
        $episode = Episode::with('season')->findOrFail($id);
        return view('user.serie.show', [
            'title' => $serie->title,
            'episodeView' => $episode,
            'serie' => $serie,
            'seasons' => $serie->seasons,
        ]);
    }
}
