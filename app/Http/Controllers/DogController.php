<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Owner;
use Illuminate\Http\Request;

class DogController extends Controller
{
    public function index(Request $request)
    {
        return Dog::with('owner')->get();
    }

    public function create(Request $request): Dog
    {
        $request->validate([
            'name' => 'required',
            'owner_id' => 'required',
        ]);

        $owner = Owner::findOrFail($request->input('owner_id'));
        $dog = new Dog();
        $dog->name = $request->input('name');
        $dog->owner()->associate($owner);
        $dog->save();

        return $dog;
    }
}
