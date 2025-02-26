<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Visitor;
use App\Models\User;
use App\Models\VisitType;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login', ['title' => 'Login Form']);
    }

    public function dashboard()
    {

        $user = Auth::user();
        if(Auth::user()->role_id == '1') {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code',$user->village_code);
        }

        $guestDaily = $visitor->whereDate('check_in', today())->get()->count();
        $guestWeekly = $visitor->whereBetween('check_in', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->get()->count();
        $guestMonthly = $visitor->whereMonth('check_in', today()->month)
            ->whereYear('check_in', today()->year)
            ->get()->count();
        $guestYearly = $visitor->whereYear('check_in', today()->year)->get()->count();

        $studi_banding = $visitor->where('objective','Studi Banding')->get()->count();
        $cari_informasi = $visitor->where('objective','Cari Informasi')->get()->count();
        $pembinaan = $visitor->where('objective','Pembinaan')->get()->count();
        $koordinasi = $visitor->where('objective','Koordinasi')->get()->count();
        $lainnya = Visitor::whereNotIn('objective', ['Studi Banding', 'Cari Informasi', 'Pembinaan', 'Koordinasi'])->count();
        return view(
            'admin.dashboard',
            [
                'user' => Auth::user(),
                'username' => Auth::user()->username,
                'photo' => Auth::user()->photo,
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

    public function visitors()
    {
        $user = Auth::user();
        if(Auth::user()->role_id == '1') {
            $visitor = Visitor::all();
        } else {
            $visitor = Visitor::where('village_code',$user->village_code)->get();
        }


        return view(
            'admin.visitor',
                ['visitors' => $visitor, 'user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo,]
        );
    }

    public function receptionist()
    {
        if(Auth::user()->role_id == '2') {
            return redirect()->route('admin.dashboard');
        }
        $receptionists = User::where('role_id', '2')->get();
        return view('admin.receptionists', ['user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo, 'receptionists' => $receptionists]);
    }

    public function masterData(){
        return view('admin.masterdata',['user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo,'visitors' => Visitor::all()]);
    }

    public function qrCode()
    {
        $user = Auth::user();
        if(Auth::user()->role_id == '1') {
            $admin = true;
        } else {
            $admin = false;
        }
        return view('admin.qrCode', ['admin' => $admin,'user' => Auth::user(),'username' => Auth::user()->username,'photo' => Auth::user()->photo,'visitTypes' => VisitType::all()]);
    }
}
