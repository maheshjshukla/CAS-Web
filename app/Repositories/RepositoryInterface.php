<?php

namespace App\Repositories;

interface RepositoryInterface {

    /**
     * Get Currently Model Instance
     * @return mixed
     */
    public function getModel();

    /**
     * Create new model Instance
     * @return mixed
     */
    public function newInstance();

    /**
     * Get all
     * @return array
     */
    public function getAll();

    /**
     * Get detail for provided id
     * @param  integer $id
     * @return Object
     */
    public function get($id);

    /**
     * Create new model
     * @param   array   $data
     * @return  Booleanable
     */
    public function add($data);

    /**
     * Edit model
     * @param  array $data
     * @return Booleanable
     */
    public function edit($data);

    /**
     * Delete model
     * @param  integer $id
     * @return Boolean
     */
    public function delete($id);

    /**
     * Call method in provided model
     * @param  string $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters);

}