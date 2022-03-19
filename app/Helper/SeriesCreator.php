<?php

namespace App\Helper;

use App\Serie;
use App\Season;
use Illuminate\Support\Facades\DB;

class SeriesCreator
{

    public function createSerie(string $serieName, int $numberSeasons, int $numberEpisodes): Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(['name' => $serieName]);
        $this->createSeasons($numberSeasons, $numberEpisodes, $serie);
        DB::commit();
        
        return $serie;
    }

    private function createSeasons(int $numberSeasons, int $numberEpisodes, Serie $serie)
    {
        for ($i=1; $i <= $numberSeasons; $i++) { 
            $season = $serie->seasons()->create(['number' => $i]);
            $this->createEpisodes($numberEpisodes, $season);
        }
    }
    
    private function createEpisodes(int $numberEpisodes, Season $season)
    {
        for ($j=1; $j <= $numberEpisodes; $j++) { 
            $season->episodes()->create(['number' => $j]);
        }
    }
}