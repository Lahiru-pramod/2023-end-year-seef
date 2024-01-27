<div> 
<h1 class="bg-blue-700 text-center py-5 text-3xl font-bold text-white font-sans">Star Wars Franchise</h1>
<div class="pagination-list container mx-auto py-10">
    <div>  
        <table class="w-full">
            <tr>
                <th class="text-left">Name</th>
                <th class="text-left">Diameter</th>
                <th class="text-left">Terrain</th>
                <th class="text-left">Population</th>
                <th class="text-left">Rotation Speed</th>
                <th class="text-left"></th>
            </tr>
        @foreach ($currentPageResponse['results'] as $planet)
            <tr>
                <td>{{$planet['name']}}</td>
                <td>{{$planet['diameter']}}</td>
                <td>{{$planet['terrain']}}</td>
                <td>{{$planet['population']}}</td>
                <td>{{$this->planetRotationSpeed($planet['diameter'],$planet['rotation_period'])}}</td>
                <td>
                    <a type="button" wire:click="goForPlanet('{{$planet['url']}}')"> 
                        Go to planet
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="pt-10">
        @if ($currentPageResponse['previous'] != null)
        <button class="bg-red-500 py-2 px-3 mr-4" wire:click="goPreviousPage('{{$currentPageResponse['previous']}}')">< previous</button>
        @endif
        @if ($currentPageResponse['next'] != null)   
        <button class="bg-green-500 py-2 px-3" wire:click="goNextPage('{{$currentPageResponse['next']}}')">next ></button>
        @endif
    </div>
    </div>
</div>
</div>
