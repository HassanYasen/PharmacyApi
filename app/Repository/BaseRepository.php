<?php
namespace App\Repository;
use Illuminate\Database\Eloquent\Model;
abstract class BaseRepository 
{
    public $model;
    public function __construct(Model $model){
        $this->model = $model;
    }
    public function getAll() 
    {
        return $this->model->all();
    }

    public function getById($Id)
    {
        return $this->model->findOrFail($Id);
    }

    public function create(array $Details) 
    {
        return $this->model->create($Details);
    }

    public function update($Id, array $newDetails) 
    {
        return $this->model->whereId($Id)->update($newDetails);
    }

    public function delete($Id) 
    {
        $this->model->destroy($Id);
    }

    public function getFulfilled() 
    {
        return $this->model->where('is_fulfilled', true);
    }
}