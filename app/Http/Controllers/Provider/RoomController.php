<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function serviceList(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $service = Service::where('user_id', Auth::user()->id)
            ->get();
        return view('provider.services.list', compact('service'));
    }

    public function serviceCreate(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = ServiceCategories::where('status', 1)
            ->get();

        return view('provider.services.create', compact('category'));
    }

    public function serviceStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $storeService = new Service();

        $storeService->name = $request->input('name');
        $storeService->user_id = Auth::user()->id;
        $storeService->category_id = $request->input('category');
        $storeService->price = $request->input('price');
        $storeService->status = $request->input('status');
        $storeService->note = $request->input('note') ?? ' ';

        $storeService->save();

        return redirect('provider/services-list')
            ->with('notification', 'Added service successfully');
    }

    public function serviceEdit($id)
    {
        $editService = Service::find($id);

        $category = ServiceCategories::where('status', 1)
            ->get();

        return view('provider.services.edit', [
            'editService' => $editService,
            'category' => $category,
        ]);
    }

    public function serviceUpdate(Request $request, $id)
    {
        $updateService = Service::findOrFail($id);

        $updateService->name = $request->input('name');
        $updateService->user_id = Auth::user()->id;
        $updateService->category_id = $request->input('category');
        $updateService->price = $request->input('price');
        $updateService->status = $request->input('status');
        $updateService->note = $request->input('note') ?? ' ';
        $updateService->save();

        return redirect("provider/services-edit/" . $id)
            ->with('notification', 'Update service successfully');
    }

    public function serviceDelete($id)
    {
        $deleteService = Service::findOrFail($id);
        $deleteService->delete();

        return redirect('provider/services-list')
            ->with('notification', 'Delete service successfully');
    }
}
