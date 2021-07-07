<?php

namespace App\Repositories;

/**
 * Abstract class that other repositories will extend
 * Provides CRUD operations for given model
 */
abstract class EloquentRepository implements RepositoryInterface
{

    protected $model;

    public function getModel()
    {
        return $this->model;
    }

    public function newInstance()
    {
        return $this->model->newInstance();
    }

    /**
     * Get All Model
     * @return Illuminate\Database\Eloquent\Model
     */
    public function getAll()
    {
        return $this->model::all();
    }

    /**
     * Get Specific Model
     * @param  integer $id
     * @return Illuminate\Database\Eloquent\Model | NotFoundException
     */
    public function get($id)
    {
        return $this->model->where('id', $id)->firstOrFail();
    }

    protected function fillNSave($data)
    {
        $this->model->fill($data);

        return $this->model->save();
    }

    /**
     * Create new
     * @param  array $data
     * @return Illuminate\Database\Eloquent\Model|boolean
     */
    public function add($data)
    {
        $this->model = $this->newInstance();
        $saved = $this->fillNSave($data);

        if($saved)
            return $this->get($this->model->id);
        else
            return false;
    }

    /**
     * Update Model
     * @param  Array  $data
     * @return Illuminate\Database\Eloquent\Model|boolean
     */
    public function edit($data)
    {
        $this->model = $this->get($data['id']);

        $saved = $this->fillNSave($data);

        if($saved){
            return $this->model;
        }else{
            return false;
        }
    }

    /**
     * @param Illuminate\Database\Eloquent\Model
     * @return mixed
     */
    /**
     * Delete Model
     * @param  integer $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Call a function in the model
     * @param  string $method
     * @param  array $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->model, $method], $parameters);
    }

}