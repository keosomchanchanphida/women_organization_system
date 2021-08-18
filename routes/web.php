<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ExportPDFController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/contacts', function() { return view('contacts'); })->name('contacts');
Route::get('/history', function() { return view('history'); })->name('history');
Route::get('/show-members', [MemberController::class, 'index'])->name('show-members');
Route::get('/files', [FileController::class, 'index'])->name('all-files');

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/add-member', [MemberController::class, 'create'])->name('add-member');
    Route::post('/store-member', [MemberController::class, 'store'])->name('store-member');
    Route::get('/edit-member/{member}', [MemberController::class, 'edit'])->name('edit-member');
    Route::patch('/update-member/{member}', [MemberController::class, 'update'])->name('update-member');
    Route::delete('/delete-member/{member}', [MemberController::class, 'destroy'])->name('delete-member');

    Route::get('/add-inside-activity', [ActivityController::class, 'createInsideActivity'])->name('add-inside-activity');
    Route::get('/add-outside-activity', [ActivityController::class, 'createOutsideActivity'])->name('add-outside-activity');
    Route::post('/store-activity', [ActivityController::class, 'storeActivity'])->name('store-activity');
    Route::get('/edit-activity/{activity}', [ActivityController::class, 'edit'])->name('edit-activity');
    Route::patch('/update-activity/{activity}', [ActivityController::class, 'update'])->name('update-activity');
    Route::delete('/delete-activity/{activity}', [ActivityController::class, 'destroy'])->name('delete-activity');

    Route::get('/add-file', [FileController::class, 'create'])->name('add-file');
    Route::post('/store-file', [FileController::class, 'store'])->name('store-file');
    Route::get('/edit-file/{file}', [FileController::class, 'edit'])->name('edit-file');
    Route::patch('/update-file/{file}', [FileController::class, 'update'])->name('update-file');
    Route::delete('/delete-file/{file}', [FileController::class, 'destroy'])->name('delete-file');

    //routes related to data for member
    Route::get('/add-province', [DataController::class, 'addProvinceForm'])->name('add-province-form');
    Route::post('/add-province', [DataController::class, 'addProvince'])->name('add-province');
    Route::get('/add-district', [DataController::class, 'addDistrictForm'])->name('add-district-form');
    Route::post('/add-district', [DataController::class, 'addDistrict'])->name('add-district');
    Route::get('/add-village', [DataController::class, 'addVillageForm'])->name('add-village-form');
    Route::post('/add-village', [DataController::class, 'addVillage'])->name('add-village');
    Route::get('/add-tribe', [DataController::class, 'addTribeForm'])->name('add-tribe-form');
    Route::post('/add-tribe', [DataController::class, 'addTribe'])->name('add-tribe');
    Route::get('/add-religious', [DataController::class, 'addReligiousForm'])->name('add-religious-form');
    Route::post('/add-religious', [DataController::class, 'addReligious'])->name('add-religious');
    Route::get('/add-major', [DataController::class, 'addMajorForm'])->name('add-major-form');
    Route::post('/add-major', [DataController::class, 'addMajor'])->name('add-major');
    Route::get('/add-education', [DataController::class, 'addEducationForm'])->name('add-education-form');
    Route::post('/add-education', [DataController::class, 'addEducation'])->name('add-education');
    Route::get('/add-career', [DataController::class, 'addCareerForm'])->name('add-career-form');
    Route::post('/add-career', [DataController::class, 'addCareer'])->name('add-career');
    Route::get('/add-state-position', [DataController::class, 'addStatePositionForm'])->name('add-state-position-form');
    Route::post('/add-state-position', [DataController::class, 'addStatePosition'])->name('add-state-position');
    Route::get('/add-political-position', [DataController::class, 'addPoliticalPositionForm'])->name('add-political-position-form');
    Route::post('/add-political-position', [DataController::class, 'addPoliticalPosition'])->name('add-political-position');
    Route::get('/add-graduated-place', [DataController::class, 'addGraduatedPlaceForm'])->name('add-graduated-place-form');
    Route::post('/add-graduated-place', [DataController::class, 'addGraduatedPlace'])->name('add-graduated-place');
    Route::get('/add-status', [DataController::class, 'addStatusForm'])->name('add-status-form');
    Route::post('/add-status', [DataController::class, 'addStatus'])->name('add-status');
    Route::get('/add-duty', [DataController::class, 'addDutyForm'])->name('add-duty-form');
    Route::post('/add-duty', [DataController::class, 'addDuty'])->name('add-duty');

    Route::post('/export', [ExportPDFController::class, 'export']);
    Route::get('/download/{filename}', [ExportPDFController::class, 'download']);
});

Route::get('/inside-activities', [ActivityController::class, 'insideActivities'])->name('inside-activities');
Route::get('/outside-activities', [ActivityController::class, 'outsideActivities'])->name('outside-activities');
Route::get('/activity/{activity}', [ActivityController::class, 'show'])->name('show-activity');
