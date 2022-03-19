<?php

namespace App\Http\Controllers;

use App\Episode;
use App\Helper\SeriesCreator;
use App\Helper\SeriesRemover;
use App\Http\Requests\SeriesFormRequest;
use App\Season;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)     
    {
        $series = Serie::query()->orderBy('name')->get();
        $message = $request->session()->get('message');
        return view('series.index', compact('series', 'message'));
    }

    public function create()
    {
        return view('series.create');
    }
    
    public function store(SeriesFormRequest $request, SeriesCreator $serieCreator)
    {
        $serie = $serieCreator->createSerie($request->get('name'), $request->get('number_of_seasons'), $request->__get('number_of_episodes'));
        $request->session()->flash(
            'message', 
            "Serie {$serie->__get('name')}, inserida com sucesso!"
        );
        return redirect()->route('series_list');
    }
    public function destroy(Request $request, SeriesRemover $serieRemover)
    {
        $serieName = $serieRemover->removeSerie($request->id);
        $request->session()->flash('message', "Série $serieName deletada com sucesso");
        return redirect()->route('series_list');
    }

    public function nameUpdate(Request $request)
    {
        $newName = $request->name;
        $serie = Serie::find($request->id);
        $serie->name = $newName;
        $serie->save();
    }
}