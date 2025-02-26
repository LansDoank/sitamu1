<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function line()
    {
        $visitors = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->get();
        return response()->json($visitors);
    }

    public function candle(){
        $supra_desa = Visitor::where('institution','Supra desa')->get()->count();
        $aph = Visitor::where('institution','APH')->get()->count();
        $warga = Visitor::where('institution','Warga')->get()->count();
        $media = Visitor::where('institution','Media')->get()->count();
        $lainnya = Visitor::whereNotIn('institution', ['Supra desa', 'APH', 'Warga', 'Media'])->count();
        $data = [$supra_desa,$aph,$warga,$media,$lainnya];
        return response()->json($data);
    }

    public function doughnut() {
        $studi_banding = Visitor::where('objective','Studi Banding')->get()->count();
        $cari_informasi = Visitor::where('objective','Cari Informasi')->get()->count();
        $pembinaan = Visitor::where('objective','Pembinaan')->get()->count();
        $koordinasi = Visitor::where('objective','Koordinasi')->get()->count();
        $lainnya = Visitor::whereNotIn('objective', ['Studi Banding', 'Cari Informasi', 'Pembinaan', 'Koordinasi'])->count();
        $objective = [$studi_banding,$cari_informasi,$pembinaan,$koordinasi,$lainnya];
        return response()->json($objective);
    }

    public function geographical(){
        $geoData = Visitor::select('province_code', DB::raw('COUNT(*) as visitors'))
        ->groupBy('province_code')
        ->get();

    return response()->json($geoData);
    }


    public function time() {
        $guest_data = Visitor::select(
            DB::raw("HOUR(check_in) as hour"), // Ambil jam saja
            DB::raw("COUNT(*) as guests") // Hitung jumlah tamu per jam
        )
        ->whereDate('check_in', Carbon::today()) // Filter untuk hari ini
        ->groupBy('hour')
        ->orderBy('hour')
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
