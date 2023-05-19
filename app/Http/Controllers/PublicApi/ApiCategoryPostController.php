<?php

namespace App\Http\Controllers\PublicApi;

use App\Http\Controllers\Controller;
use App\Models\PostCategories;

class ApiCategoryPostController extends Controller
{
    public function getCategory(): \Illuminate\Http\JsonResponse
    {
        $category = PostCategories::where('status', 1)->get();
        return response()->json([
            'success' => true,
            'category' => $category
        ]);
    }
}
