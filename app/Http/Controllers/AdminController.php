<?php

namespace App\Http\Controllers;

use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use App\Models\User;
use App\Models\VisitType;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login', ['title' => 'Login Form']);
    }

    public function dashboard()
    {

        $user = Auth::user();
        if($user->role_id == '1') {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code',$user->village_code);
        }

        $is_admin = $user->role_id == 1 ? true : false;

        $guestDaily = (clone $visitor)->whereDate('check_in', today())->get()->count();
        $guestWeekly = (clone $visitor)->whereBetween('check_in', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->get()->count();
        $guestMonthly = (clone $visitor)->whereMonth('check_in', today()->month)
            ->whereYear('check_in', today()->year)
            ->get()->count();
        $guestYearly = (clone $visitor)->whereYear('check_in', today()->year)->get()->count();

        $studi_banding = (clone $visitor)->where('objective','Studi Banding')->count();
        $cari_informasi = (clone $visitor)->where('objective','Cari Informasi')->count();
        $pembinaan = (clone $visitor)->where('objective','Pembinaan')->count();
        $koordinasi = (clone $visitor)->where('objective','Koordinasi')->count();
        $lainnya = (clone $visitor)->whereNotIn('objective', ['Studi Banding', 'Cari Informasi', 'Pembinaan', 'Koordinasi'])->count();

        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;


        return view(
            'admin.dashboard',
            [
                'title' => 'Admin 
                Dashboard',
                'user' => Auth::user(),
                'username' => Auth::user()->username,
                'photo' => Auth::user()->photo,
                'isreceptionist' => $visit,
                'is_admin' => $is_admin,
                'guestDaily' => $guestDaily,
                'guestWeekly' => $guestWeekly,
                'guestMonthly' => $guestMonthly,
                'guestYearly' => $guestYearly,
                'studi_banding' => $studi_banding,
                'cari_informasi' => $cari_informasi,
                'pembinaan' => $pembinaan,
                'koordinasi' => $koordinasi,
                'lainnya' => $lainnya,
            ]
        );
    }

    public function choose()
    {
        $user = Auth::user();
    
        $is_admin = $user->role_id == 1 ? true : false;
        $village = VisitType::all();
        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;
        

        if($is_admin) {
            return view(
                'admin.choose',
                    ['title' => 'Admin - Pilih Desa','isreceptionist' => $visit, 'villages' => $village, 'qrcode' => $visit,'user' => $user,'is_admin' => $is_admin,'village_code' => $user->village_code,'username' => $user->username,'photo' => Auth::user()->photo,]
            );

        } else {
            return redirect("/admin/visitor/$user->village_code");
        }
    }

    public function receptionist()
    {
        $user = Auth::user();
        if($user->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }
        $receptionists = User::where('role_id', '2')->get();
        $is_admin = $user->role_id == 1 ? true : false;
        $visit = VisitType::where('village_code',$user->village_code ?? null)->first()->id ?? null;



        return view('admin.receptionists', ['title' => 'Admin - Resepsionis','isreceptionist' => $visit,'user' => Auth::user(),'is_admin' => $is_admin,'username' => Auth::user()->username,'photo' => Auth::user()->photo, 'receptionists' => $receptionists]);
    }

    public function masterData(){
        return view('admin.masterdata',['user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo,'visitors' => Visitor::all()]);
    }

    public function qrCode()
    {
        $user = Auth::user();
        if($user->role_id == '1') {
            $admin = true;
            $qrcode = VisitType::all();
        } else {
            $admin = false;
            $qrcode = VisitType::where('village_code',$user->village_code)->get();
        }
        $is_admin = $user->role_id == 1 ? true : false;
        $visit = VisitType::where('village_code',$user->village_code)->first()->id;


        return view('admin.qrCode', ['title' => 'Admin - Kode Qr', 'isreceptionist' => $visit,'admin' => $admin,'is_admin' => $is_admin,'user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo,'visitTypes' => $qrcode]);
    }
}
