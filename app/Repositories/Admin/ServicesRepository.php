<?php

namespace App\Repositories\Admin;

use App\Models\Service;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;

class ServicesRepository extends BaseRepository implements RepositoryInterface
{

    /**
     * @return mixed
     */
    public function getModel()
    {
        return Service::class;
    }

    public function getAllServices()
    {
        return $this->getModel()->all();
    }
}
