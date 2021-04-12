<?php

namespace App\Http\Controllers;

use App\Models\Admin\City;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function getCitiesByRegionId(Request $request) {
        $cities = City::getCitiesByRegionID($request->DataID);
        return response()->json($cities);
    }
}
