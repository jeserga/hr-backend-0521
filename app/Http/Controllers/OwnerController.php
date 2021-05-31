<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function create(Request $request): Owner
    {
        $request->validate([
            'name' => 'required'
        ]);

        $owner = new Owner();
        $owner->name = $request->input('name');
        $owner->save();

        return $owner;
    }

    public function list() {
        return Owner::with('dogs')->get();
    }
}
