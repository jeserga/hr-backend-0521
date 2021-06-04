<?php


namespace App\Repositories;


use App\Models\Dog;
use App\Models\Owner;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DogRepository implements DogRepositoryInterface
{
    protected $model;

    /**
     * DogRepository constructor.
     *
     * @param Dog $dog
     */
    public function __construct(Dog $dog)
    {
        $this->model = $dog;
    }

    public function all()
    {
        return $this->model->with('owner')->get();
    }

    public function create(array $data)
    {
        $owner = Owner::findOrFail($data['owner_id']);
        $model = $this->model->newModelInstance();
        $model->name = $data['name'];
        $model->owner()->associate($owner);
        $model->save();
        return $model;
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $dog = $this->model->find($id)) {
            throw new ModelNotFoundException("Dog not found");
        }

        return $dog;
    }
}
