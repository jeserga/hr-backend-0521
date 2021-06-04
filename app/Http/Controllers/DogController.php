<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Repositories\DogRepositoryInterface;
use Illuminate\Http\Request;

class DogController extends Controller
{
    /** @var DogRepositoryInterface */
    private $repository;

    public function __construct(DogRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        return $this->repository->all();
    }

    public function create(Request $request): Dog
    {
        $request->validate([
            'name' => 'required',
            'owner_id' => 'required',
        ]);

        return $this->repository->create($request->all());
    }
}
