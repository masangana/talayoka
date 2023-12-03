<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Historical;
use App\Models\Movie;
use App\Models\Series;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
      
      $lastMovies = Movie::with('category', 'artworkInfo')->latest()->take(6)->get();
      $lastesMovies = Movie::with('category', 'artworkInfo')->latest()->take(4)->get();
      $suggestedMovies = Movie::with('category', 'artworkInfo')->inRandomOrder()->take(3)->get();
      $topMovies = Movie::with('category', 'artworkInfo')->inRandomOrder()->take(5)->get();
      $lastSeries = Series::with('category', 'artworkInfo')->latest()->take(6)->get();
      $lastesSeries = Series::with('category', 'artworkInfo')->latest()->take(4)->get();
      $suggestedSerie = Series::with('category', 'artworkInfo')->inRandomOrder()->first();
      $topSeries = Series::with('category', 'artworkInfo')->take(6)->get();
      $classicMovies = Movie::with('category', 'artworkInfo')->where('category_id', 1)->take(3)->get();
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
          'lastesMovies' => $lastesMovies,
          'lastesSeries' => $lastesSeries,
          'classicMovies' => $classicMovies,
      ]);
    }

    public function profile() {
        $serieHists = Historical::where('user_id', auth()->user()->id)->with('historicable')->where('historicable_type', 'App\Models\Series')->latest()->paginate(6);
        $movieHists= Historical::where('user_id', auth()->user()->id)->with('historicable')->where('historicable_type', 'App\Models\Movie')->latest()->paginate(6);
        
        return view('user.profile.show', [
          'title' => "Mon profil",
          'serieHists' => $serieHists,
          'movieHists' => $movieHists,
        ]);
    }
}
