<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;
use App\Models\Village;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function province()
    {
        $province = Province::where('name', 'LIKE', '%' . request('q') . '%')->paginate(30);

        return response()->json($province);
    }

    public function district($code)
    {
        $district = District::where('province_id', $code)->where('name', 'LIKE', '%' . request('q') . '%')->paginate(30);

        return response()->json($district);
    }

    public function subDistrict($code)
    {
        $sub_district = SubDistrict::where('district_code', $code)->get();
        return $sub_district;
    }

    public function village($code)
    {
        $village = Village::where('sub_district_code', $code)->get();
        return $village;
    }
}
