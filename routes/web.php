<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/add-member', [MemberController::class, 'create'])->name('add-member');
    Route::post('/store-member', [MemberController::class, 'store'])->name('store-member');
    Route::get('/show-members', [MemberController::class, 'index'])->name('show-members');

    Route::get('/add-province', [DataController::class, 'addProvinceForm'])->name('add-province-form');
    Route::post('/add-province', [DataController::class, 'addProvince'])->name('add-province');
    Route::get('/add-district', [DataController::class, 'addDistrictForm'])->name('add-district-form');
    Route::post('/add-district', [DataController::class, 'addDistrict'])->name('add-district');
    Route::get('/add-village', [DataController::class, 'addVillageForm'])->name('add-village-form');
    Route::post('/add-village', [DataController::class, 'addVillage'])->name('add-village');
});

Route::get('/inside-activities', [ActivityController::class, 'insideActivities'])->name('inside-activities');
Route::get('/outside-activities', [ActivityController::class, 'outsideActivities'])->name('outside-activities');
