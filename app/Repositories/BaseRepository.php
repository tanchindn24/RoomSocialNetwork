<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Support\Str;

abstract class BaseRepository implements RepositoryInterface
{
    //model muốn tương tác
    protected $model;

    //khởi tạo
    public function __construct()
    {
        $this->setModel();
    }

    //lấy model tương ứng
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getModelEq() {
        return $this->model;
    }

    public function getPaginate($withRelation = [], $orderBy = '', $withCount = [])
    {
        $query = $this->model->with($withRelation)->withCount($withCount);
        if (!empty($orderBy)) $query->orderByRaw($orderBy);
        return $query->paginate(20);
    }

    public function getAll($withRelation = [], $orderBy = '', $withCount = [])
    {
        $query = $this->model->with($withRelation)->withCount($withCount);
        if (!empty($orderBy)) $query->orderByRaw($orderBy);
        return $query->get();
    }

    public function find($id, $with = [])
    {
        $result = $this->model->with($with)->find($id);
        return $result;
    }

    public function findOrFail($id, $with = []) {
        $result = $this->model->with($with)->findOrFail($id);
        return $result;
    }

    public function findOne($where = [], $with = [])
    {
        $result = $this->model->where($where)->with($with)->first();
        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }
        return false;
    }
}
