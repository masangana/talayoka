<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use App\Models\ArtworkInfo;
use App\Models\Category;
use App\Models\Series;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ImageIntervention;

class SerieController extends Controller
{
    /**
        * Display a listing of the resource.
        *
        * @return Response
        */
        public function index()
        {
            $series = Series::with('category', 'artworkInfo')-> latest()->get();
            //return $series;
            return view('admin.serie.index', [
                'title' => "Liste des series",
                'series' => $series
            ]);
        }
    
        /**
            * Show the form for creating a new resource.
            *
            * @return Response
            */
        public function create()
        {
            $categories = Category::all();
            $series = Series::latest()->get;
            return view('admin.serie.create', [
                'title' => "Créer une serie",
                'categories' => $categories,
                'series' => $series
            ]);

        }
    
        /**
            * Store a newly created resource in storage.
            *
            * @return Response
            */
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|unique:series|max:255',
                'slug' => 'required',
                'description' => 'required',
                'category_id' => 'required',
                'trailler' => 'required',
                'director' => 'required',
                'production_date' => 'required',
                'cover' => 'required',
            ]);

            try {
                $result =  DB::transaction(function () use ($request){
                    if ($request->hasFile('cover')){
                        $folder_name = time().rand(1,99);
                        $file_name = $folder_name.'.'.$request->cover->extension();
                        ImageIntervention::make($request->cover)->resize(550, 412)->save(storage_path('app/public/cover/'.$file_name));
                    }

                    $serie = Series::create([
                        'title' => $request->title,
                        'slug' => $request->slug,
                        'description' => $request->description,
                        'category_id' => $request->category_id,
                    ]);
                    ArtworkInfo::create([
                        'artworkable_type' => 'App\Models\Series',
                        'artworkable_id' => $serie->id,
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
        }
    
        /**
            * Display the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function show($id)
        {
            //
        }
    
        /**
            * Show the form for editing the specified resource.
            *
            * @param  int  $id
            * @return Response
            */
        public function edit($id)
        {
            return view('admin.serie.edit', [
                'title' => "Modifier une serie",
                'serie' => Series::with('artworkInfo') ->findOrFail($id),
                'categories' => Category::all(),
            ]);
        }
    
        /**
            * Update the specified resource in storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function update($id)
        {
            return $id;
            return view('admin.serie.edit', [
                'title' => "Modifier une serie",
                'serie' => Series::findOrFail($id),
                'categories' => Category::all(),
            ]);
        }
    
        /**
            * Remove the specified resource from storage.
            *
            * @param  int  $id
            * @return Response
            */
        public function destroy($id)
        {
            //
        }
}
