<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Artwork;
use App\Models\ArtworkInfo;
use App\Models\Historical;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image as ImageIntervention;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    public function index(){
        //return $artists = Artist::with('artworkable')-> latest()->paginate(12);
        return view('admin.artist.index', [
            'title' => "Liste des artistes",
            'artists' => Artist::with('artworkable')-> latest()->paginate(12),
        ]);
    }

    public function create(){
        return view('admin.artist.create', [
            'title' => "Ajouter un artiste",
        ]);
    }

    public function store(Request $request){
        
        $this->validate($request, [
            'name' => 'required|string|max:255|unique:artists,name',
            'description' => 'required|string',
            'picture' => 'required|image',
            'date_of_birth' => 'required|date',

        ]);

        try {
            DB::transaction(function () use ($request){
                if ($request->hasFile('picture')){
                    $folder_name = time().rand(1,99);
                    $file_name = $folder_name.'.'.$request->picture->extension();
                    ImageIntervention::make($request->picture)->resize(550, 412)->save(storage_path('app/public/picture/'.$file_name));
                }

                Artist::create([
                    'name' => $request->name,
                    'comments' => $request->description,
                    'picture' => $file_name,
                    'date_of_birth' => $request->date_of_birth,
                ]);
            });
            return redirect()->back()->with('success', "L'artiste a bien été ajouté");
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', "Une erreur est survenue lors de l'ajout de l'artiste");
        }
        return redirect()->back()->with('success', "L'artiste a bien été ajouté");
    }

    public function show($id){
        $artist = Artist::with('artworks')-> findOrFail($id);
        $artwokInfos = ArtworkInfo::with('artworkable')->get();
        return view('admin.artist.show', [
            'title' => $artist->name,
            'artist' => $artist,
            'artwokInfos' => $artwokInfos,
        ]);
    }

    public function addArtwork(Request $request){
        $request->validate([
            'artist_id' => 'required',
            'artwork' => 'required',
        ]);
        $artwork = explode(',', $_POST['artwork']);
        $artworkType = $artwork[1];
        $artworkId = $artwork[0];
        $existingArtwork = Artwork::where('artist_id', $request->artist_id)
            ->where('artworkable_type', $artworkType)
            ->where('artworkable_id', $artworkId)
            ->first();

            if ($existingArtwork) {
                return redirect()->back()->with('message', "Existe déjà");
            } else {
                // L'enregistrement n'existe pas, vous pouvez créer un nouvel enregistrement
                Artwork::create([
                    'artist_id' => $request->artist_id,
                    'artworkable_type' => $artworkType,
                    'artworkable_id' => $artworkId,
                ]);
                return redirect()->back()->with('message',"Ajouté avec succes");
            }

        return redirect()->back();
    }
}
