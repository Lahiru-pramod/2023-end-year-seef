<div> 
<h1 class="bg-blue-700 text-center py-5 text-3xl font-bold text-white font-sans">Star Wars Franchise</h1>
<div class="pagination-list container mx-auto py-10">
    <h2></h2>
    <label class="text-lg font-bold pr-3 font-sans" for="">Get all planets</label>
    <input type="checkbox" wire:model.live="inputValuegetALLPlanets" value="true">
    <div>  
        @dump($firtPageResponse['results'])       
        <table class="table-auto">
            <tr>
                <th>Name</th>
                <th>Diameter</th>
                <th>Terrain</th>
                <th>Population</th>
                <th></th>
            </tr>
        @foreach ($firtPageResponse['results'] as $planet)
            <tr>
                <td>{{$planet['name']}}</td>
                <td>{{$planet['diameter']}}</td>
                <td>{{$planet['terrain']}}</td>
                <td>{{$planet['population']}}</td>
                <td>
                    <button type="button" wire:click="goForPlanet"> 
                        Go to planet
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</div>
</div>
