<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Owner;
use App\Models\Park;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class ParkController extends Controller
{

    /**
     * Add owners with dogs. If dogs is not specified, this function add all owner's dogs
     * @param Request $request
     * @return Park
     */
    public function addOwnerWithDogs(Request $request): Park
    {
        $request->validate([
            'park_id' => 'exists:parks,id|required',
            'owner_id' => 'exists:owners,id|required',
            'dogs' => 'array',
            'dogs.*' => [
                Rule::exists('dogs', 'id')->where(function ($query) use ($request) {
                    return $query->where('owner_id', $request->input('owner_id'));
                }),
            ]
        ]);

        $park = Park::findOrFail($request->input('park_id'));

        $dogs = $request->input('dogs');
        if (empty($dogs)) {
            $owner = Owner::findOrFail($request->input('owner_id'));
            $dogs = $owner->dogs;
        }

        $park->dogs()->attach($dogs);

        return $park;
    }

    public function listOwnersWithDogs(Request $request): JsonResponse
    {
        $park = Park::findOrFail($request->input('park_id'));
        if(Cache::has($park->id.'_owners') && Cache::has($park->id.'_dogs')) {
            $response = ["owners" => Cache::get($park->id.'_owners'), "dogs" => Cache::get($park->id.'_dogs')];
        } else {

            $ownersInPark = Owner::inPark($park->id)->get();
            $dogsInPark = Dog::inPark($park->id)->get();
            Cache::put($park->id.'_owners', $ownersInPark);
            Cache::put($park->id.'_dogs', $dogsInPark);
            $response = ["owners" => $ownersInPark, "dogs" => $dogsInPark];

        }
        return response()->json($response);
    }

    /**
     * Esta función echa a los propietarios de perros a irse del parque cuando ha pasado más de una hora.
     */
    public function forceOwnersLeave(Request $request): Park
    {
        $request->validate([
            'park_id' => 'exists:parks,id|required'
        ]);

        $park = Park::findOrFail($request->input('park_id'));

        $park->dogs()->detach();

        return $park;
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
