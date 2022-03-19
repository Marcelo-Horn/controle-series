<?php

namespace App\Helper;

use App\{Serie, Season, Episode};
use Illuminate\Support\Facades\DB;

class SeriesRemover
{
    public function removeSerie(int $serieId)
    {
        $serieName = '';
        DB::transaction(function () use ($serieId, &$serieName) {
            $serie = Serie::find($serieId);
            $serieName = $serie->__get('name');

            $this->seasonsRemove($serie);
            $serie->delete();
        });
        return $serieName;
    }

    private function seasonsRemove(Serie $serie)
    {
        $serie->seasons->each(function (Season $season) {
            $this->episodesRemove($season);
            $season->delete();
        });
    }
    
    private function episodesRemove(Season $season)
    {
        $season->episodes->each(function (Episode $episode) {
            $episode->delete();
            });
    }
}