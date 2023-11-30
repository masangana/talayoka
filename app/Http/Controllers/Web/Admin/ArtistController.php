<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\Historical;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ImageIntervention;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        return view('admin.artist.index', [
            'title' => "Liste des artistes",
            'artists' => Artist::latest()->paginate(12),
        ]);
    }

    public function create(){
        return view('admin.artist.create', [
            'title' => "Ajouter un artiste",
        ]);
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:artists',
            'description' => 'required|string',
            'picture' => 'required|image',
            'date_of_birth' => 'required|date',

        ]);

        try {
            $result =  DB::transaction(function () use ($request){
                if ($request->hasFile('picture')){
                    $folder_name = time().rand(1,99);
                    $file_name = $folder_name.'.'.$request->picture->extension();
                    ImageIntervention::make($request->picture)->resize(550, 412)->save(storage_path('app/public/picture/'.$file_name));
                }

                $artist = Artist::create([
                    'name' => $request->name,
                    'biography' => $request->description,
                    'picture' => $file_name,
                    'date_of_birth' => $request->date_of_birth,
                ]);
                return $artist;
            });

            return redirect()->back()->with('success', "L'artiste a bien été ajouté");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Une erreur est survenue lors de l'ajout de l'artiste");
        }
        return redirect()->back()->with('success', "L'artiste a bien été ajouté");
    }
}
