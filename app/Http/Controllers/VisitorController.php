<?php

namespace App\Http\Controllers;

use App\Models\VisitType;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;
use App\Models\Village;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{

    public function form()
    {
        return view('user.form', ['title' => 'Formulir Bertamu', 'visitTypes' => VisitType::all()]);
    }

    public function desa()
    {
        return view('visitor.village', ['title' => 'Form - Desa', 'provinces' => Province::orderBy('name', 'asc')->get()]);
    }


    public function dataDesa(Request $request)
    {
        $request->validate([
            'province' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'village' => 'required',
        ]);

        $village = VisitType::where('village_code', $request->village)->first();
        if ($village) {
            return redirect("/form/$village->village_code/$village->slug");
        } else {
            return redirect()->route("visitor.popup")->with('village-error', 'Mohon maaf desa yang anda tuju blm terdaftar di Sitamu');
        }
    }

    public function visitors($code)
    {
        $user = Auth::user();

        if ($user->role_id == 1) {
            $visitor = Visitor::where('village_code', $code)->get();
            $village_code = $user->village_code;
            $village_name = Str::ucfirst(Village::where('code', $code)->first()->name);
            $slug = Str::slug(Village::where('code', $village_code)->first()->name);
            $is_admin = $user->role_id == 1 ? true : false;

            $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;


            $title = "Desa $village_name";

            return view(
                'admin.visitor',
                ['title'=> $title, 'isreceptionist' => $visit, 'visitors' => $visitor, 'code' => $code, 'user' => $user, 'is_admin' => $is_admin, 'village_code' => $user->village_code, 'slug' => $slug,  'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo,]
            );
        } else if ($code == $user->village_code) {
            $visitor = Visitor::where('village_code', $code)->get();
            $village_code = $user->village_code;
            $slug = Str::slug(Village::where('code', $village_code)->first()->name);
            $is_admin = $user->role_id == 1 ? true : false;

            $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;



            return view(
                'admin.visitor',
                ['isreceptionist' => $visit,'title' => 'Tamu - TamuDesa' ,'visitors' => $visitor, 'code' => $code, 'user' => $user, 'is_admin' => $is_admin, 'village_code' => $user->village_code, 'slug' => $slug,  'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo,]
            );
        } else {
            return redirect('/admin/visitor/' . $user->village_code);
        }
    }



    public function show($code, $slug)
    {
        $user = Auth::user();
        // $id = $code;
        $code = str_split($code);
        $provinceCode = $code[0] . $code[1];
        $districtCode = $code[0] . $code[1] . $code[2] . $code[3];
        $subDistrictCode = $code[0] . $code[1] . $code[2] . $code[3] . $code[4] . $code[5];
        $villageCode = "$code[0]$code[1]$code[2]$code[3]$code[4]$code[5]$code[6]$code[7]$code[8]$code[9]";

        $village = VisitType::where('village_code', $villageCode);
        $village = $village->where('slug', $slug)->first();
        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;
        $village_name = "Desa " . Str::ucfirst($village->name);


        return view('user.form', [
            'isreceptionist' => $visit,
            'title' => "Form Tamu - $village_name",
            'visit' => $village,
            'provinces' => Province::orderBy('name', 'asc')->get(),
        ]);
    }

    public function preview($id)
    {
        $user = Auth::user();
        $is_admin = $user->role_id == 1 ? true : false;
        $visitor = Visitor::find($id);
        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;


        if ($user->role_id == '2') {
            if ($user->village_code != $visitor->village_code) {
                return redirect("/admin/visitor/$user->village_code");
            }
        }
        return view('visitor.preview', ['title' => 'Pratinjau Tamu','isreceptionist' => $visit, 'user' => Auth::user(), 'is_admin' => $is_admin,  'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo, 'visitor' => $visitor]);
    }

    public function addVisitor(Request $request)
    {

        $newVisitor = new Visitor();
        $newVisitor->fullname = $request->fullname;
        $newVisitor->institution = $request->institution;
        $newVisitor->address = $request->province . " " . $request->district . " " . $request->sub_district .  " " . $request->village;
        $newVisitor->check_in = $request->check_in;
        $newVisitor->check_out = $request->check_out;
        $newVisitor->telephone = $request->telephone;
        $newVisitor->visitor_photo = $request->file('visitor_photo')->store('user_photo');
        $newVisitor->visit_type_id = $request->visit_type;
        $newVisitor->objective = $request->objective;
        $newVisitor->i_n_i = $request->i_n_i;
        $newVisitor->province_code = $request->province_code;
        $newVisitor->district_code = $request->district_code;
        $newVisitor->subdistrict_code = $request->sub_district_code;
        $newVisitor->village_code = $request->village_code;
        $newVisitor->save();


        return redirect()->route('visitor.popup')->with('visitor_success', 'Data berhasil ditambahkan!');
    }

    public function popup()
    {
        return view('visitor.popup', ['title' => 'Form Desa']);
    }

    public function add($code)
    {
        $user = Auth::user();
        $is_admin = $user->role_id == 1 ? true : false;
        $code = str_split($code);
        $province_code = $code[0] . $code[1];
        $district_code = $code[0] . $code[1] . $code[2] . $code[3];
        $sub_district_code = $code[0] . $code[1] . $code[2] . $code[3] . $code[4] . $code[5];
        $village_code = "$code[0]$code[1]$code[2]$code[3]$code[4]$code[5]$code[6]$code[7]$code[8]$code[9]";
        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;
        $village = VisitType::where('village_code', $village_code)->first()->id;
        return view('visitor.add', ['title' => 'Tambah Tamu','isreceptionist' => $visit, 'is_admin' => $is_admin, 'user' => Auth::user(),  'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo, 'provinces' => Province::orderBy('name', 'asc')->get(), 'province_code' => $province_code, 'district_code' => $district_code, 'sub_district_code' => $sub_district_code, 'village_code' => $village_code, 'visit_type' => $village]);
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'fullname' => 'required',
            'institution' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'telephone' => 'required',
            'visitor_photo' => 'required',
            'visit_type' => 'required',
            'objective' => 'required',
            'province' => 'required',
            'district' => 'required',
            'sub_district' => 'required',
            'village' => 'required',
            'province_code' => 'required',
            'district_code' => 'required',
            'sub_district_code' => 'required',
            'village_code' => 'required',
        ]);


        $newVisitor = new Visitor();
        $newVisitor->fullname = $request->fullname;
        $newVisitor->institution = $request->institution;
        $newVisitor->address = $request->province . " " . $request->district . " " . $request->sub_district .  " " . $request->village;
        $newVisitor->check_in = $request->check_in;
        $newVisitor->check_out = $request->check_out;
        $newVisitor->telephone = $request->telephone;
        $newVisitor->visitor_photo = $request->file('visitor_photo')->store('user_photo');
        $newVisitor->visit_type_id = $request->visit_type;
        $newVisitor->objective = $request->objective;
        $newVisitor->i_n_i = $request->i_n_i;
        $newVisitor->province_code = $request->province_code;
        $newVisitor->district_code = $request->district_code;
        $newVisitor->subdistrict_code = $request->sub_district_code;
        $newVisitor->village_code = $request->village_code;
        $newVisitor->save();

        if ($user->role_id == 1) {
            return redirect()->back()->with('visitor_success', 'Data tamu baru berhasil ditambahkan!');
        }

        return redirect("/admin/visitor/$user->village_code")->with('visitor_success', 'Data tamu baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $is_admin = $user->role_id == 1 ? true : false;
        $visitor = Visitor::find($id);
        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;



        if ($is_admin || $user->village_code == $visitor->village_code) {
            return view('visitor.edit', ['isreceptionist' => $visit,  'title' => 'Edit Tamu', 'is_admin' => $is_admin, 'user' => Auth::user(),  'username' => Auth::user()->name ?? Auth::user()->username, 'photo' => Auth::user()->photo, 'oldVisit' => $visitor, 'provinces' => Province::orderBy('name', 'asc')->get(),]);
        }

        return redirect("/admin/visitor/$user->village_code");
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'fullname' => 'required',
            'institution' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'telephone' => 'required',
            'objective' => 'required',
        ]);


        $visitor = Visitor::find($request->id);
        $visitor->update([
            'fullname' => $request->fullname,
            'institution' => $request->institution,
            'address' => $request->province . " " . $request->district . " " . $request->sub_district .  " " . $request->village,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'telephone' => $request->telephone,
            'visit_type_id' => $request->visit_type,
            'objective' => $request->objective,
            'i_n_i' => $request->i_n_i,
        ]);

        if ($request->village) {
            $visitor->update([
                'province_code' => $request->province,
                'district_code' => $request->district,
                'subdistrict_code' => $request->sub_district,
                'village_code' => $request->village,
            ]);
        } else {
            $visitor->update([
                'province_code' => $request->old_province,
                'district_code' => $request->old_district,
                'subdistrict_code' => $request->old_sub_district,
                'village_code' => $request->old_village,
            ]);
        }

        if ($request->hasFile('visitor_photo')) {
            if ($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $visitor->update([
                'visitor_photo' => $request->file('visitor_photo')->store('user_photo'),
            ]);
        }

        if ($user->role_id == 1) {
            return redirect()->back()->with('visitor_success', 'Data tamu baru berhasil diperbaharui!');
        }

        return redirect("/admin/visitor/$user->village_code")->with('visitor_success', 'Data tamu berhasil diperbaharui');
    }

    public function delete($id)
    {
        $user = Auth::user();
        $visitor = Visitor::find($id);
        if ($user->role_id == 1) {
            $visitor->delete();
            return redirect()->back()->with('visitor_success', 'Data tamu baru berhasil dihapus!');
        }
        if ($user->village_code == $visitor->village_code) {
            $visitor->delete();
            return redirect("/admin/visitor/$user->village_code")->with('visitor_success', 'Data tamu berhasil dihapus');
        }
        return redirect("/admin/visitor/$user->village_code");
    }

    public function generate($code)
    {
        $user = Auth::user();
        if ($user->role_id == 3) {
            return redirect()->route('index');
        }


        if ($user->role_id == '1') {
            $visitor = Visitor::where('village_code', $code)->get();
        } else {
            if ($user->village_code != $code) {
                return redirect()->back();
            }
            $visitor = Visitor::where('village_code', $user->village_code)->get();
        }


        $visit = VisitType::where('village_code', $code)->first();
        $title = 'Data Tamu Desa ' . $visit->village->name . ',' . 'Kecamatan ' . $visit->subdistrict->name . ',' . $visit->district->name;

        return view('visitor.generate', ['title' => $title, 'visitors' => $visitor]);
    }
}
