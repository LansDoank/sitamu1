<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;
use App\Models\User;
use App\Models\Village;
use App\Models\Visitor;
use App\Models\VisitType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QrCodeController extends Controller
{
    public function add()
    {
        $user = Auth::user();
        $is_admin = $user->role_id == 1 ? true : false;
        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;


        return view('qrcode.add', ['title' => 'Tambah Kode Qr','isreceptionist' => $visit, 'user' => Auth::user(), 'is_admin' => $is_admin,  'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo, 'provinces' => Province::orderBy('name', 'asc')->get()]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'province' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'village' => 'required'
        ]);

        $visit = VisitType::where('village_code', $request->village)->first();
        if ($visit) {
            return redirect()->route('admin.qrCode')->with('qrcode_error', 'Kode qr sudah ada!');
        }

        $village_name = Village::where('code', $request->village)->first()->name;
        $slug = Str::slug(Village::where('code', $request->village)->first()->name);
        $qr_code = new VisitType();
        $qr_code->qr_code = "https://tamudesa.id/form/$request->village/$slug";
        $qr_code->name = $village_name;
        $qr_code->slug = Str::slug($village_name);
        $qr_code->province_code = $request->province;
        $qr_code->district_code = $request->district;
        $qr_code->sub_district_code = $request->sub_district;
        $qr_code->village_code = $request->village;
        $qr_code->save();

        return redirect()->route('admin.qrCode')->with('qrcode_success', 'Data kode qr baru telah ditambahkan!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $visits = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;


        $is_admin = $user->role_id == 1 ? true : false;
        if($user->role_id == 2) {
            return redirect("/generate/qrcode/$visits");
        }
        if ($user->role_id == '1') {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code', $user->village_code);
        }
        $visit = VisitType::find($id);

        return view('qrcode.edit', [ 'title' => 'Edit Kode Qr', 'isreceptionist' => $visits, 'is_admin' => $is_admin, 'user' => Auth::user(),  'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo, 'oldVisit' => $visit, 'provinces' => Province::orderBy('name', 'asc')->get()]);
    }

    public function update(Request $request)
    {
        $visitDuplicate = VisitType::where('village_code', $request->village)->first();
        if ($visitDuplicate) {
            return redirect()->route('admin.qrCode')->with('qrcode_error', 'Kode Qr Sama Telah Terdaftarkan!');
        }

        $visit = VisitType::find($request->id);


        if ($request->village) {
            $slug = Str::slug(Village::where('code', $request->village)->first()->name);
            $village_name = Village::where('code', $request->village)->first()->name;
        } else {
            $slug = $request->old_slug;
            $village_name = $request->old_name;
        }

        // fungsi update

        $visit->update([
            'qr_code' => "https://tamudesa.id/form/$request->village/$slug",
            'name' => $village_name,
            'slug' => Str::slug($village_name),
        ]);

        if ($request->village) {
            $visit->update([
                'province_code' => $request->province,
                'district_code' => $request->district,
                'sub_district_code' => $request->sub_district,
                'village_code' => $request->village
            ]);
            return redirect()->route('admin.qrCode')->with('qrcode_success', 'Data kode qr berhasil diperbaharui!');
        } else {
            $visit->update([
                'province_code' => $request->old_province,
                'district_code' => $request->old_district,
                'sub_district_code' => $request->old_sub_district,
                'village_code' => $request->old_village
            ]);
            return redirect()->route('admin.qrCode')->with('qrcode_error', 'Mohon isi semua form alamat!');
        }
    }

    public function delete($id)
    {
        $qr_code = VisitType::find($id);
        $visitor = Visitor::where('visit_type_id', $id)->delete();
        $receptionist = User::where('role_id', 2)->where('village_code', $qr_code->village_code)->delete();
        $qr_code->delete();

        return redirect()->route('admin.qrCode')->with('qrcode_success', "Data desa $qr_code->name berhasil dihapus!");
    }

    public function generate($id)
    {
        $user = Auth::user();
        $visit = VisitType::find($id);
        if($user->role_id == '1' || $user->village_code == $visit->village_code) {
            $title = 'Download QR Code Desa ' . $visit->village->name . ',' . 'Kecamatan ' . $visit->subdistrict->name . ',' . $visit->district->name;
            return view('qrcode.generate', ['title' => $title, 'user' => Auth::user(), 'qrcode' => $visit]);
        }
        return redirect('/admin/qr_code');
    }
}
