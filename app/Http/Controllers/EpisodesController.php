<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(int $seasonId, Request $request)
    {
        $season = Season::find($seasonId);
        $episodes = $season->episodes;
        $message = $request->session()->get('message');

        return view('episodes.index', compact('season', 'episodes', 'message'));
    }

    public function watch(int $seasonId, Request $request)
    {
        $watchedEpisodes = $request->episodes;

        $season = Season::find($seasonId);
        $episodesList[] = $season->episodes;
        foreach($episodesList as $episode) {
            foreach($episode as $a){
                if($watchedEpisodes){
                    if(in_array($a['id'], $watchedEpisodes)) {
                        $a['assistido'] = true;
                        continue;
                    }
                }
                $a['assistido'] = false;
            }
            $season->push();
            $request->session()->flash('message' , 'Salvo com sucesso!');

            return redirect()->back();
        }
    }
}