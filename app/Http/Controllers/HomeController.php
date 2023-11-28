<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Series;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function welcome(){

        $lastMovies = Movie::with('category', 'artworkInfo')->latest()->take(6)->get();
        $suggestedMovies = Movie::with('category', 'artworkInfo')->inRandomOrder()->take(3)->get();
        $topMovies = Movie::with('category', 'artworkInfo')->inRandomOrder()->take(5)->get();
        $lastSeries = Series::with('category', 'artworkInfo')->latest()->take(6)->get();
        $suggestedSerie = Series::with('category', 'artworkInfo')->inRandomOrder()->first();
        $topSeries = Series::with('category', 'artworkInfo')->take(6)->get();
        return view('welcome', [
            'title' => "Bienvenue sur le site de streaming",
            'movies' => Movie::with('category', 'artworkInfo')->latest()->get(),
            'series' => Series::with('category', 'artworkInfo')->latest()->get(),
            'categories' => Category::all(),
            'lastMovies' => $lastMovies,
            'topMovies' => $topMovies,
            'lastSeries' => $lastSeries,
            'topSeries' => $topSeries,
            'suggestedMovies' => $suggestedMovies,
            'suggestedSerie' => $suggestedSerie,
        ]);
    }
}
