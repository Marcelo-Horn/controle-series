<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $table = 'episodes';
    protected $fillable = ['number'];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }
}
