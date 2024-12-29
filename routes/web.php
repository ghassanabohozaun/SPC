<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'namespace' => 'Site',
        'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    ////////////////////////////////////////////////////////////
    /// any
    Route::get('', function () {
        return view('site.index');
    })->where(['any' => '.*']);

    // index
    Route::get('/', [SiteController::class, 'index'])->name('index');

    // external link
    Route::get('/link/{link}/{id}', [SiteController::class, 'externalLink'])->name('site.external.link');

});

