<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\SubDistrict;
use App\Models\Village;
use App\Models\VisitType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    public function login()
    {
        return view('receptionist.login', ['title' => 'Login Form']);
    }

    public function addReceptionist()
    {
        if (Auth::user()->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }
        return view('receptionist.add', ['title' => 'Add Receptionist', 'user' => Auth::user(), 'username' => Auth::user()->username, 'photo' => Auth::user()->photo, 'provinces' => Province::all()]);
    }

    public function create()
    {
        $provinces = Province::all();
        $districts = District::all();
        $sub_districts = SubDistrict::all();
        $villages = Village::all();

        return view('receptionist.create', compact('provinces', 'districts', 'sub_districts', 'villages'));
    }

    // Fungsi untuk mengambil kabupaten berdasarkan provinsi yang dipilih
    public function getDistrictsByProvince($province_code)
    {
        $districts = District::where('province_code', $province_code)->get();
        return response()->json($districts);
    }

    // Fungsi untuk mengambil kecamatan berdasarkan kabupaten yang dipilih
    public function getSubDistrictsByDistrict($district_code)
    {
        $sub_districts = SubDistrict::where('district_code', $district_code)->get();
        return response()->json($sub_districts);
    }

    // Fungsi untuk mengambil desa berdasarkan kecamatan yang dipilih
    public function getVillagesBySubDistrict($sub_district_code)
    {
        $villages = Village::where('sub_district_code', $sub_district_code)->get();
        return response()->json($villages);
    }

    // Fungsi untuk menyimpan data receptionist
    public function store(Request $request)
    {
        // Proses penyimpanan data receptionist
    }


    public function add(Request $request)
    {
        $duplicate = User::where('username', $request->username)->first();
        if ($duplicate) {
            return redirect()->route('admin.receptionists')->with('error', 'Username sudah sudah dipakai!');
        }

        $receptionist = new User();
        $receptionist->name = $request->name;
        $receptionist->username = $request->username;
        $receptionist->password = bcrypt($request->password); // Pastikan password di-hash
        $receptionist->role_id = '2';
        $receptionist->province_code = $request->province;
        $receptionist->district_code = $request->district;
        $receptionist->sub_district_code = $request->sub_district;
        $receptionist->village_code = $request->village;

        if ($request->hasFile('receptionist_photo')) {
            $receptionist->photo = $request->file('receptionist_photo')->store('receptionist_photo');
        }

        $receptionist->save();

        $visit = VisitType::where('village_code', $request->village)->first();
        if ($visit) {
            return redirect()->route('admin.receptionists')->with('success', 'Receptionist added successfully with QR Code');
        }

        $slug = Str::slug(Village::where('code', $request->village)->first()->name);
        $village = new VisitType();
        $village->qr_code = "127.0.0.1:8000/form/$request->village/$slug";
        $villageName = Village::where('code', $request->village)->first();
        $village->name = $villageName->name;
        $village->slug  = Str::slug($villageName->name);
        $village->province_code = $request->province;
        $village->district_code = $request->district;
        $village->sub_district_code = $request->sub_district;
        $village->village_code = $request->village;
        $village->save();

        return redirect()->route('admin.receptionists')->with('success', 'Receptionist added successfully with QR Code');
    }


    public function show($id)
    {
        if (Auth::user()->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }
        $receptionist = User::find($id);
        return view('receptionist.edit', ['title' => 'Edit Receptionist', 'user' => Auth::user(), 'username' => Auth::user()->username, 'photo' => Auth::user()->photo, 'oldReceptionist' => $receptionist, 'provinces' => Province::all(), 'districts' => District::all(), 'sub_districts' => SubDistrict::all(), 'villages' => Village::all()]);
    }

    public function update(Request $request)
    {
        $receptionist = User::find($request->id);
        // dd($request->province,$request->district,$request->sub_district,$request->village);
        $receptionist->update([
            'name' => $request->name,
            'username' => $request->username,
            'province_code' => $request->province,
            'district_code' => $request->district,
            'sub_district_code' => $request->sub_district,
            'village_code' => $request->village,
        ]);

        if ($request->file('image')) {
            if ($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $receptionist->update([
                'photo' => $request->file('image')->store('receptionist_photo'),
            ]);
        }

        // $receptionist->update([
        //     'photo' => 'p'
        // ]);

        return redirect()->route('admin.receptionists')->with('success', 'Data Berhasil Diubah!');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect()->route('admin.receptionists')->with('success', 'Receptionist deleted successfully');
    }
}
