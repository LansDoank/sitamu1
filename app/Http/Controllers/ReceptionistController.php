<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\User;
use App\Models\SubDistrict;
use App\Models\Village;
use App\Models\Visitor;
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

        $user = Auth::user();
        $is_admin = $user->role_id == 1 ? true : false;
        if ($user->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }

        $visit = VisitType::where('village_code', $user->village_code ?? null)->first()->id ?? null;


        return view('receptionist.add', ['isreceptionist' => $visit, 'title' => 'Tambah Resepsionis', 'is_admin' => $is_admin, 'user' => Auth::user(), 'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo, 'provinces' => Province::orderBy('name', 'asc')->get()]);
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
        $districts = District::where('province_code', $province_code)
            ->orderBy('name', 'asc')
            ->get();
        return response()->json($districts);
    }

    // Fungsi untuk mengambil kecamatan berdasarkan kabupaten yang dipilih
    public function getSubDistrictsByDistrict($district_code)
    {
        $sub_districts = SubDistrict::where('district_code', $district_code)
            ->orderBy('name', 'asc')
            ->get();
        return response()->json($sub_districts);
    }

    // Fungsi untuk mengambil desa berdasarkan kecamatan yang dipilih
    public function getVillagesBySubDistrict($sub_district_code)
    {
        $villages = Village::where('sub_district_code', $sub_district_code)
            ->orderBy('name', 'asc')
            ->get()
            ->map(function ($village) {
                $village->name = ucwords(strtolower($village->name));
                return $village;
            });

        return response()->json($villages);
    }
    public function getVillageByName($name = null)
    {
        $villages = VisitType::where('name', 'LIKE', "%$name%")
            ->orderBy('name', 'asc')
            ->get();

        $villages = $villages->map(function ($village) {
            $village->name = ucwords(strtolower($village->name));
            return $village;
        });

        return response()->json($villages);
    }

   


    public function getVillage($village_code)
    {
        $villages = VisitType::where('village_code', $village_code)
            ->orderBy('name', 'asc')
            ->get()
            ->map(function ($village) use ($village_code) {
                $village->name = ucwords(strtolower($village->name));
                $village->visitor = Visitor::where('village_code',$village_code)->count();
                return $village;
            });
        return response()->json($villages);
    }

    public function getDesa() {
        return response()->json(VisitType::all());
    }

    // public function getProvince($code)
    // {
    //     $villages = VisitType::where('province_code', $code)
    //         ->orderBy('name', 'asc')
    //         ->get()
    //         ->map(function ($village) {
    //             $village->name = ucwords(strtolower($village->name));
    //             return $village;
    //         });
    //     return response()->json($villages);
    // }


    // Fungsi untuk menyimpan data receptionist
    public function store(Request $request)
    {
        // Proses penyimpanan data receptionist
    }


    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'province' => 'required',
            'district' => 'required',
            "sub_district" => 'required',
            'village' => 'required',
            'receptionist_photo' => 'required',
        ]);

        $duplicate = User::where('username', $request->username)->first();
        if ($duplicate) {
            return redirect()->route('admin.receptionists')->with('receptionist_error', 'Username sudah digunakan!');
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
            return redirect()->route('admin.receptionists')->with('receptionist_success', 'Akun resepsionis baru telah ditambahkan!');
        }

        $slug = Str::slug(Village::where('code', $request->village)->first()->name);
        $village = new VisitType();
        $village->qr_code = "https://tamudesa.id/form/$request->village/$slug";
        $villageName = Village::where('code', $request->village)->first();
        $village->name = $villageName->name;
        $village->slug  = Str::slug($villageName->name);
        $village->province_code = $request->province;
        $village->district_code = $request->district;
        $village->sub_district_code = $request->sub_district;
        $village->village_code = $request->village;
        $village->save();

        return redirect()->route('admin.receptionists')->with('receptionist_success', 'Akun resepsionis baru dan kode qr baru telah ditambahkan!');
    }

    public function preview($id)
    {
        $users = User::find($id);

        $user = Auth::user();
        $is_admin = $user->role_id == 1 ? true : false;

        if ($user->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }

        $visit = VisitType::where('village_code', $user->village_code ?? null)->first()->id ?? null;



        return view('receptionist.preview', ['title' => 'Detail Resepsionis', 'isreceptionist' => $visit, 'users' => $users, 'is_admin' => $is_admin, 'user' => $user, 'username' => $user->username, 'photo' => $user->photo]);
    }


    public function show($id)
    {

        $user = Auth::user();
        $is_admin = $user->role_id == 1 ? true : false;
        if ($user->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }
        $receptionist = User::find($id);
        $visit = VisitType::where('village_code', $user->village_code ?? null)->first()->id ?? null;



        return view('receptionist.edit', ['isreceptionist' => $visit, 'title' => 'Edit Resepsionis', 'is_admin' => $is_admin, 'user' => Auth::user(), 'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo, 'oldReceptionist' => $receptionist, 'provinces' => Province::orderBy('name', 'asc')->get(),]);
    }

    public function update(Request $request)
    {
        $receptionist = User::find($request->id);
        $receptionist->update([
            'name' => $request->name,
            'username' => $request->username,
        ]);

        if ($request->password) {
            $receptionist->update([
                'password' => $request->password,
            ]);
        } else {
            $receptionist->update([
                'password' => $request->old_password,
            ]);
        }

        if ($request->village) {
            $receptionist->update([
                'province_code' => $request->province,
                'district_code' => $request->district,
                'sub_district_code' => $request->sub_district,
                'village_code' => $request->village,
            ]);
        } else {
            $receptionist->update([
                'province_code' => $request->old_province,
                'district_code' => $request->old_district,
                'sub_district_code' => $request->old_sub_district,
                'village_code' => $request->old_village,
            ]);
        }

        if ($request->file('image')) {
            if ($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $receptionist->update([
                'photo' => $request->file('image')->store('receptionist_photo'),
            ]);
        }


        return redirect()->route('admin.receptionists')->with('receptionist_success', 'Data resepsionis berhasil diubah!');
    }

    public function delete($id)
    {
        $user = Auth::user();
        if ($user->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }

        User::find($id)->delete();
        return redirect()->route('admin.receptionists')->with('receptionist_success', 'Data resepsionis berhasil dihapus!');
    }
}
