<?php

namespace App\Services\Admin;

use App\Models\User;
use App\Repositories\Admin\AdminRepository;

class AdminService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function getProviderPagination($currentPage, $perPage)
    {
        $provider = $this->adminRepository
            ->getProviderPagination($currentPage, $perPage);

        return $provider;
    }

    public function getSeekerPagination($currentPage, $perPage)
    {
        $seeker = $this->adminRepository
            ->getSeekerPagination($currentPage, $perPage);

        return $seeker;
    }

}
