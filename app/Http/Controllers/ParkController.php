<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use App\Models\Park;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ParkController extends Controller
{
    public function addOwnerWithDogs(Request $request)
    {

    }

    public function listOwnersWithDogs(Request $request, Park $park): JsonResponse
    {
        if(Cache::has($park->id.'_owners') && Cache::has($park->id.'_dogs')) {
            $response = ["owners" => Cache::get($park->id.'_owners'), "dogs" => Cache::get($park->id.'_dogs')];
        } else {

            $ownersInPark = []; //Completar
            $dogsInPark = []; //Completar
            Cache::put($park->id.'_owners', $ownersInPark);
            Cache::put($park->id.'_dogs', $dogsInPark);
            $response = ["owners" => $ownersInPark, "dogs" => $dogsInPark];

        }
        return response()->json($response);
    }

    /**
     * Esta función echa a los propietarios de perros a irse del parque cuando ha pasado más de una hora.
     */
    public function forceOwnersLeave()
    {

    }

    public function create(Request $request): Park
    {
        $request->validate([
            'name' => 'required'
        ]);

        $park = new Park();
        $park->name = $request->input('name');
        $park->save();

        return $park;
    }

    public function index(Request $request)
    {
        return Park::all();
    }
}
