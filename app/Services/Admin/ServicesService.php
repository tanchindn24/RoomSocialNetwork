<?php

namespace App\Services\Admin;

use App\Repositories\Admin\ServicesRepository;

class ServicesService
{

    protected ServicesRepository $servicesRepository;

    public function getAll()
    {
        return $this->servicesRepository->getAllServices();
    }
}
