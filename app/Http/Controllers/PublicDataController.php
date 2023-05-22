<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublicDataController extends Controller
{
    public function getDistricts($id): \Illuminate\Http\JsonResponse
    {
        try {
            $districts = DB::table('districts')
                ->where('province_code', $id)
                ->get();

            if ($districts->isEmpty()) {
                return response()->json([
                    'message' => false,
                    'districts' => null
                ]);
            }

            return response()->json([
                'message' => true,
                'districts' => $districts
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving data districts: ' . $e->getMessage(),
                'districts' => null
            ]);
        }
    }

    public function getWards($id): \Illuminate\Http\JsonResponse
    {
        try {
            $wards = DB::table('wards')
                ->where('district_code', $id)
                ->get();

            if ($wards->isEmpty()) {
                return response()->json([
                    'message' => false,
                    'wards' => null
                ]);
            }

            return response()->json([
                'message' => true,
                'wards' => $wards
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving data wards: ' . $e->getMessage(),
                'wards' => null
            ]);
        }
    }
}
