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
use Illuminate\Support\Facades\Storage;

class VisitorController extends Controller
{

    public function form()
    {
        return view('user.form', ['title' => 'Formulir Bertamu', 'visitTypes' => VisitType::all()]);
    }

    public function desa() {
        return view('visitor.village', ['title' => 'Form - Desa', 'provinces' => Province::all()]);
    }
    

    public function dataDesa(Request $request) {
        $village = VisitType::where('village_code',$request->village)->first();
        if($village) {
            return redirect("/form/$village->village_code/$village->slug");
        } else {
            return redirect()->route("visitor.popup")->with('village-error','Mohon maaf desa yang anda tuju blm terdaftar di Sitamu');
        }
    }

    public function show($code,$slug)
    {
        // $id = $code;
        $code = str_split($code);
        $provinceCode = $code[0] . $code[1];
        $districtCode = $code[0] . $code[1] . $code[2] . $code[3];
        $subDistrictCode = $code[0] . $code[1] . $code[2] . $code[3] . $code[4] . $code[5];
        $villageCode = "$code[0]$code[1]$code[2]$code[3]$code[4]$code[5]$code[6]$code[7]$code[8]$code[9]";

        $village = VisitType::where('village_code', $villageCode);
        $village = $village->where('slug',$slug)->first();

        return view('user.form', [
            // 'id' => $id,
            'title' => "Form Tamu - $village->name",
            'visit' => $village,
            'provinces' => Province::all(),
            ]);
    }

    public function preview($id) {
        $visitor = Visitor::find($id);
        return view('visitor.preview',['user' => Auth::user(),'username' => Auth::user()->name,'photo' => Auth::user()->photo,'visitor' => $visitor]);
    }

    public function addVisitor(Request $request)
    {
        // $request->validate([
        //     'fullname' => 'required',
        //     'email' => 'required',
        //     'telephone' => 'required',
        //     'address' => 'required',
        //     'check_in' => 'required',
        //     'check_out' => 'required',
        //     'purpose' => 'required',
        //     'person' => 'required',
        //     'room' => 'required',
        //     'status' => 'required'
        // ]);

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


        return redirect()->route('visitor.popup')->with('visitor_success', 'Data berhasil ditambahkan');
    }

    public function popup(){
        return view('visitor.popup',['title' => 'Form Desa']);
    }

    public function add(){
        // return view('visitor.add',['title' => 'Visitor Form','user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo,'provinces' => Province::all()]);
    }

    public function edit($id) {
        return view('visitor.edit',['title' => 'Edit Data Tamu','user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo,'oldVisit' => Visitor::find($id),'provinces' => Province::all(),'districts' => District::all(),'sub_districts' => SubDistrict::all(),'villages' => Village::all()]);
    }

    public function update(Request $request){
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
            'province_code' => $request->province,
            'district_code' => $request->district,
            'subdistrict_code' => $request->sub_district,
            'village_code' => $request->village,
        ]);

        if ($request->hasFile('visitor_photo')) {
            if($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $visitor->update([
                'visitor_photo' => $request->file('visitor_photo')->store('user_photo'),
            ]);
        }

        return redirect()->route('admin.visitors')->with('visitor_success','Data Berhasil Diperbaharui');
    }

    public function delete($id)
    {
        Visitor::find($id)->delete();
        return redirect()->route('admin.visitors')->with('visitor_delete', 'Data berhasil dihapus');
    }
}
