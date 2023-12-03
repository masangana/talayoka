<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'season' => 'required',
            'description' => 'required',
            'video_link' => 'required',
        ]);

        $episode = Episode::create([
            'title' => $request->title,
            'season_id' => $request->season,
            'comment' => $request->description,
            'video_link' => $request->video_link,
        ]);

        return redirect()->back()->with('success', 'Episode created successfully');
    }
}
