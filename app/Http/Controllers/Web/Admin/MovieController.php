<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ImageIntervention;
use App\Models\ArtworkInfo;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        return view('admin.movie.index', [
            'title' => "Liste des films",
            'movies' => Movie:: with('category', 'artworkInfo')->latest()->get(),
        ]);
    }

    public function create(){
        return view('admin.movie.create', [
            'title' => "Ajouter un film",
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'video_link' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            $result =  DB::transaction(function () use ($request){
                if ($request->hasFile('cover')){
                    $folder_name = time().rand(1,99);
                    $file_name = $folder_name.'.'.$request->cover->extension();
                    ImageIntervention::make($request->cover)->resize(550, 412)->save(storage_path('app/public/cover/'.$file_name));
                }

                $movie = Movie::create([
                    'title' => $request->title,
                    'slug' => $request->slug,
                    'description' => $request->description,
                    'category_id' => $request->category_id,
                    'video_link' => $request->video_link,
                ]);
                ArtworkInfo::create([
                    'artworkable_type' => 'App\Models\movie',
                    'artworkable_id' => $movie->id,
                    'trailler' => $request->trailler,
                    'director' => $request->director,
                    'production_date' => $request->production_date,
                    'cover' => $file_name,
                ]);

            });
            return redirect()->back()->with('success', 'Serie créée avec succès');
        } catch (\Throwable $th) {
            
            return redirect()->back()->with('error', 'Erreur lors de la création de la serie');
        }

        return redirect()->back()->with('success', 'Movie created successfully');
    }
}
