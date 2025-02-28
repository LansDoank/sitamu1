<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function line()
    {
        $user = Auth::user();
        if(Auth::user()->role_id == '1') {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code',$user->village_code);
        }

        $visitors = $visitor->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        return response()->json($visitors);
    }

    public function candle(){
        $user = Auth::user();
        if(Auth::user()->role_id == '1') {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code',$user->village_code);
        }

        $supra_desa = (clone $visitor)->where('institution','Supra desa')->count();
        $aph = (clone $visitor)->where('institution','APH')->count();
        $warga = (clone $visitor)->where('institution','Warga')->count();
        $media = (clone $visitor)->where('institution','Media')->count();
        $lainnya = (clone $visitor)->whereNotIn('institution', ['Supra desa', 'APH', 'Warga', 'Media'])->count();
        $data = [$supra_desa,$aph,$warga,$media,$lainnya];
        return response()->json($data);
    }

    public function doughnut() {
        $user = Auth::user();
        
        if ($user->role_id == '1') {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code', $user->village_code);
        }
    
        $studi_banding = (clone $visitor)->where('objective', 'Studi Banding')->count();
        $cari_informasi = (clone $visitor)->where('objective', 'Cari Informasi')->count();
        $pembinaan = (clone $visitor)->where('objective', 'Pembinaan')->count();
        $koordinasi = (clone $visitor)->where('objective', 'Koordinasi')->count();
        $lainnya = (clone $visitor)->whereNotIn('objective', ['Studi Banding', 'Cari Informasi', 'Pembinaan', 'Koordinasi'])->count();
    
        $objective = [$studi_banding, $cari_informasi, $pembinaan, $koordinasi, $lainnya];
    
        return response()->json($objective);
    }
    

    public function geographical(){
        $user = Auth::user();
        if(Auth::user()->role_id == '1') {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code',$user->village_code);
        }

        $geoData = $visitor->select('province_code', DB::raw('COUNT(*) as visitors'))
        ->groupBy('province_code')
        ->get();

    return response()->json($geoData);
    }


    public function time() {
        $user = Auth::user();
    
        // Query berdasarkan role
        if ($user->role_id == 1) {
            $visitor = Visitor::query();
        } else {
            $visitor = Visitor::where('village_code', $user->village_code);
        }
    
        // Ambil data jumlah tamu per jam tanpa filter tanggal
        $guest_data = $visitor->select(
                DB::raw("HOUR(check_in) as hour"), // Ambil jam dari check_in
                DB::raw("COUNT(*) as guests") // Hitung jumlah tamu per jam
            )
            ->groupBy('hour') // Kelompokkan berdasarkan jam
            ->orderBy('hour') // Urutkan berdasarkan jam
            ->get();
    
        return response()->json($guest_data);
    }
    
    

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
