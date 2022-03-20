<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';
    protected $fillable = ['number'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function serie( )
    {
        return $this->belongsTo(Serie::class);
    }
    public function getWatchedEpisodes()
    {
        return $this->episodes->filter(function (Episode $episode) {
            return $episode->assistido;
        });
    }
}
