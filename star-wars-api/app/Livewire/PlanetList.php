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
    public $currentPageResponse;

    public function render()
    {
        $this->currentPageResponse;
        $this->getALLPlanets = $this->inputValuegetALLPlanets;
        return view('livewire.planet-list');
    }

    public function  mount(){
        $this->currentPageResponse = Http::get('https://swapi.dev/api/planets/')->json();
    }

    public function goForPlanet($url){

        $pieces = explode("/", $url);
        return redirect('/planet/'.$pieces[5]);

    }

    public function goNextPage($nextPage){
        $this->currentPageResponse = Http::get($nextPage)->json();
    }

    public function goPreviousPage($previousPage){
        $this->currentPageResponse = Http::get($previousPage)->json(); 
    }

    public function planetRotationSpeed($diameter, $rotationPeriod){

        if ($diameter != "unknown" && $rotationPeriod != "unknown" && $diameter != 0 &&  $rotationPeriod != 0 ) {

            $radius = $diameter/ 2;
            $rotationSpeed = (2 * 3.14 * $radius)/$rotationPeriod;
            return sprintf("%.2f", $rotationSpeed);

        }else{
            return "unknown";
        }

    }
}
