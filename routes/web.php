<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;


Route::get('/', function () {return view('welcome');})->name('welcome');
Route::get('/arleatoire', function () {return view('arleatoire');})->name('arleatoire');

// presentation nsi
Route::any('/nsi', function(){return redirect('https://lfitokyo-nsi.github.io/presentation-nsi/');});


Route::post('/', [SiteController::class, 'creer_atelier_post'])->name('creer-atelier-post');

Route::get('/modifier', function () {
    return view('modifier');
})->name('modifier');

Route::post('/modifier', [SiteController::class, 'modifier_atelier_post'])->name('modifier-atelier-post');

Route::get('/{jeton}', function($jeton) {
    return view("atelier", ["jeton"=>$jeton]);
})->name('atelier'); 

// organisation examens
Route::get('/organisation-examens', function () {return view('organisation-examens-get');})->name('organisation-examens-get');


