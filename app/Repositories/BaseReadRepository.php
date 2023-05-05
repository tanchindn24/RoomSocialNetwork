<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Support\Str;

abstract class BaseReadRepository extends BaseRepository
{

    public function create($attributes = [])
    {
        return [];
    }

    public function update($id, $attributes = [])
    {
        return [];

    }

    public function delete($id)
    {
        return [];
    }
}
