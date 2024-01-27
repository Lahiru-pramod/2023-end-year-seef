<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\HttpClientKernel;

class StarWarsPlanetsList extends Controller
{
    public function getPageDetails($url){
      $currentPageResponse = Http::get('https://swapi.dev/api/planets/'.$url)->json();
      $diameter = $currentPageResponse['diameter'];
      $rotationPeriod = $currentPageResponse['rotation_period'];
      $rotationSpeed = 0;
        if ($diameter != "unknown" && $rotationPeriod != "unknown" && $diameter != 0 &&  $rotationPeriod != 0 ) {
            $radius = $diameter/ 2;
            $rotationSpeed = (2 * 3.14 * $radius)/$rotationPeriod;
        }

      return view('single-planet', ['planet' => $currentPageResponse , 'RS' => sprintf("%.2f", $rotationSpeed) ]);
    }
}
