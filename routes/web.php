<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\ReceptionistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ChartController;
use App\Models\Visitor;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.index');

Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/login', [LoginController::class, 'authentication']);

Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/visitor', [AdminController::class, 'visitors'])->name('admin.visitors');

    Route::get('admin/visitor/{id}',[VisitorController::class,'preview'])->name('visitor.preview');

    Route::get('/admin/visitor/edit/{id}', [VisitorController::class, 'edit'])->name('visitor.edit');

    Route::post('/admin/visitor/update',[VisitorController::class,'update'])->name('visitor.update');

    Route::get('/admin/visitor/delete/{id}', [VisitorController::class, 'delete'])->name('visitor.delete');

    Route::get('/admin/receptionist', [AdminController::class, 'receptionist'])->name('admin.receptionists');

    Route::get('/admin/receptionist/add', [ReceptionistController::class, 'addReceptionist'])->name('receptionist.addReceptionist');

    Route::post('/admin/receptionist/create', [ReceptionistController::class, 'add']);

    Route::get('/admin/receptionist/edit/{id}', [ReceptionistController::class, 'show'])->name('receptionist.edit');

    Route::post('/admin/receptionist/update', [ReceptionistController::class, 'update'])->name('receptionist.update');

    Route::get('/admin/receptionist/delete/{id}', [ReceptionistController::class, 'delete'])->name('receptionist.delete');

    Route::get('/admin/master_data',[AdminController::class,'masterData'])->name('admin.master_data');

    Route::get('/admin/qr_code', [AdminController::class, 'qrCode'])->name('admin.qrCode');

    Route::get('/admin/qr_code/add', [QrCodeController::class, 'add'])->name('qrcode.add');

    Route::post('/admin/qr_code/create', [QrCodeController::class, 'create']);

    Route::get('/admin/qr_code/edit/{id}',[QrCodeController::class,'edit']);

    Route::post('/admin/qr_code/update',[QrCodeController::class,'update']);

    Route::get('/admin/qr_code/delete/{id}',[QrCodeController::class,'delete']);
});

Route::get('/chart/line',[ChartController::class,'line'])->name('chart.line');
Route::get('/chart/candle',[ChartController::class,'candle'])->name('chart.candle');
Route::get('/chart/doughnut',[ChartController::class,'doughnut'])->name('chart.doughnut');
Route::get('/chart/geographical',[ChartController::class,'geographical'])->name('chart.geographical');
Route::get('/chart/time',[ChartController::class,'time'])->name('chart.time');


Route::get('/admin/receptionist/create', [ReceptionistController::class, 'create']);
Route::get('/api/districts/{province_code}', [ReceptionistController::class, 'getDistrictsByProvince']);
Route::get('/api/sub-districts/{district_code}', [ReceptionistController::class, 'getSubDistrictsByDistrict']);
Route::get('/api/villages/{sub_district_code}', [ReceptionistController::class, 'getVillagesBySubDistrict']);

Route::get('/visitor',function(){
    return response()->json(Visitor::all());
});

Route::get('/form', [VisitorController::class, 'form'])->name('visitor.form');

Route::get('/form/desa',[VisitorController::class,'desa'])->name('visitor.desa');

Route::post('/form/desa/data',[VisitorController::class,'dataDesa'])->name('visitor.desa.data');

Route::get('/form/{id}/{slug}', [VisitorController::class, 'show'])->name('visitor.show');

Route::post('/form/create', [VisitorController::class, 'addVisitor']);

Route::get('/form/popup',[VisitorController::class,'popup'])->name('visitor.popup');