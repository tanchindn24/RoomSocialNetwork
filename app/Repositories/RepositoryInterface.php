<?php

namespace App\Repositories;

interface RepositoryInterface
{

    /**
     * Get Chunk
     * @return mixed
     */
    public function getPaginate($withRelation = [], $orderBy = '', $withCount = []);

    /**
     * Get all
     * @return mixed
     */
    public function getAll($withRelation = [], $orderBy = '', $withCount = []);

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($id, $with = []);

    public function findOrFail($id, $with = []);

    public function findOne($where = [], $with = []);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($id);
}
