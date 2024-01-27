<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\Dump;

class PlanetList extends Component
{
    use WithPagination;

    public $planetList = [];
    public $getALLPlanets;
    public $inputValuegetALLPlanets;
    public $allPlanets = [];
    public $firtPageResponse;

    public function render()
    {

        $this->getALLPlanets = $this->inputValuegetALLPlanets;
        return view('livewire.planet-list');
    }

    public function  mount(){
        $this->firtPageResponse = Http::get('https://swapi.dev/api/planets/')->json();
    }

    public function goForPlanet(){

        return redirect('planet')->with('id', 'go');

    }
}
