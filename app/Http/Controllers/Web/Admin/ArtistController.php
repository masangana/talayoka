<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
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
}
