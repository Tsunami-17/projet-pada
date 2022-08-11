<?php
use App\Http\Livewire\TypologieCommuneSelect;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formVoieController;
use App\Http\Controllers\HomeController;


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

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/adminHome', [HomeController::class, 'adminHome'])->name('admin.home');
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/managerHome', [HomeController::class, 'managerHome'])->name('manager.home');
});


/*------------------------------------------
--------------------------------------------
Logout
--------------------------------------------
--------------------------------------------*/
Route::get('logout', [HomeController::class, 'logout'])->name('logout');

/*------------------------------------------
--------------------------------------------
Logout
--------------------------------------------
--------------------------------------------*/

//Route::get('/denomination', '\App\Http\Livewire\TypologieCommuneSelect')->name('TypologieCommuneSelect')->middleware('auth');
//Route::get('/denomination', [TypologieCommuneSelect::class, 'render'])->name('TypologieCommuneSelect')->middleware('auth');

//Route::get('/denomination', \App\Http\Livewire\TypologieCommuneSelect::class)->middleware('auth');

Route::get('/denomination', [formVoieController::class,'index'])->middleware('auth');

route::post('denomination/fetch', [formVoieController::class,'fetch'])->name('formVoieController.fetch')->middleware('auth');

route::post('denomination/typevoie', [formVoieController::class,'typevoie'])->name('formVoieController.typevoie')->middleware('auth');

route::post('denomination/voie', [formVoieController::class,'voie'])->name('formVoieController.voie')->middleware('auth');

route::post('denomination/fclass', [formVoieController::class,'fclass'])->name('formVoieController.fclass')->middleware('auth');

route::post('denomination/fetchtypo', [formVoieController::class,'fetchtypo'])->name('formVoieController.fetchtypo')->middleware('auth');

route::post('denomination/description', [formVoieController::class,'description'])->name('formVoieController.description')->middleware('auth');

route::post('denomination/zoomCommune', [formVoieController::class,'zoomCommune'])->name('formVoieController.zoomCommune')->middleware('auth');
