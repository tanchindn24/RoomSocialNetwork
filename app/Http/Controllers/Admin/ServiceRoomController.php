<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategories;
use App\Repositories\Admin\ServicesRepository;
use App\Services\Admin\ServicesService;
use Illuminate\Http\Request;

class ServiceRoomController extends Controller
{

    //protected ServicesService $servicesService;

    public function getModelService(): string
    {
        return Service::class;
    }

    public function getModelServiceCategories(): string
    {
        return ServiceCategories::class;
    }


    public function serviceCategoryList(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = ServiceCategories::all();

        return view('admin.services_category.list', compact('category'));
    }

    public function serviceCategoryStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $storeServiceCategory = new ServiceCategories();

        $storeServiceCategory->name = $request->input('name');
        $storeServiceCategory->status = $request->input('status');

        $storeServiceCategory->save();

        return redirect('admin/service-category-list')
            ->with('notification', 'add data successfully');
    }

    public function serviceCategoryInactive($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $inactiveCategory = ServiceCategories::find($id);

        $inactiveCategory->status = 2;
        $inactiveCategory->save();

        return redirect('admin/service-category-list')
            ->with('notification', 'Inactive successfully');
    }

    public function serviceCategoryActive($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $inactiveCategory = ServiceCategories::find($id);

        $inactiveCategory->status = 1;
        $inactiveCategory->save();

        return redirect('admin/service-category-list')
            ->with('notification', 'Active successfully');
    }
}
