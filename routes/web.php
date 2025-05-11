<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;


Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/arleatoire', function () {return view('art-leatoire');})->name('art-leatoire');
Route::get('/art-leatoire-2023', function () {return view('art-leatoire-2023');})->name('art-leatoire-2023');
Route::get('/art-leatoire-2024', function () {return view('art-leatoire-2024');})->name('art-leatoire-2024');
Route::get('/art-leatoire-2025', function () {return view('art-leatoire-2025');})->name('art-leatoire-2025');

// presentation nsi
Route::any('/nsi', function(){return redirect('https://lfitokyo-nsi.github.io/presentation-nsi/');});


Route::post('/', [SiteController::class, 'creer_atelier_post'])->name('creer-atelier-post');

Route::get('/modifier', function () {
    return view('modifier');
})->name('modifier');

Route::post('/modifier', [SiteController::class, 'modifier_atelier_post'])->name('modifier-atelier-post');


// organisation examens
Route::get('/organisation-examens', [SiteController::class, 'organisation_examens_get'])->name('organisation-examens-get');
Route::post('/organisation-examens', [SiteController::class, 'organisation_examens_post'])->name('organisation-examens-post');
Route::any('/organisation-examens-resultats', function () {return view('organisation-examens-resultats');})->name('organisation-examens-resultats');


Route::get('/{jeton}', function($jeton) {
    return view("atelier", ["jeton"=>$jeton]);
})->name('atelier');
