<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Season;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'serie' => 'required',
        ]);

        $season = Season::create([
            'title' => $request->title,
            'series_id' => $request->serie,
        ]);

        return redirect()->back()->with('success', 'Season created successfully');
    }
}
