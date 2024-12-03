<?php

use App\Http\Controllers\Site\MediaController;
use App\Http\Controllers\Site\NewsController;
use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\PublicationController;
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
    Route::get('/', 'SiteController@index')->name('index');

    // about
    Route::get('About/{name}', [SiteController::class, 'about'])->name('about');

    // faq
    Route::get('/faq', [SiteController::class, 'qa'])->name('faq');

    // founders
    Route::get('/founders', 'TeamsController@founders')->name('founders');
    // directors
    Route::get('/directors', 'TeamsController@directors')->name('directors');
    // team
    Route::get('/team', 'TeamsController@team')->name('team');

    // projects
    Route::get('/projects/{type}', [ProjectController::class, 'getProjects'])->name('projects');
    Route::get('/project-details/{title}', [ProjectController::class, 'detailProject'])->name('project-details');
    Route::get('/projects/{name}/case-study', [ProjectController::class, 'getCaseStudies'])->name('project-case-study');

    // news
    Route::get('/news', [NewsController::class, 'getNews'])->name('news');
    Route::get('/new-details/{title}', [NewsController::class, 'detailNew'])->name('new-details');
    Route::post('/send-comment', [NewsController::class, 'sendComment'])->name('send-comment');


    // publication
    Route::get('/publications/{type}', [PublicationController::class, 'getPublications'])->name('advertisements');
    Route::get('/publication-details/{title}', [PublicationController::class, 'detailPublication'])->name('advertisement-details');

    // reports
    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::get('/report-details/{year?}', 'ReportsController@details')->name('report-details');


    Route::get('/photos-albums', [MediaController::class, 'photosAlbums'])->name('photos-albums');

    Route::get('/photo-albums-details/{title}',  [MediaController::class, 'photosAlbumsDetails'])->name('photo-albums-details');

    Route::get('/videos', [MediaController::class, 'videos'])->name('videos');


    Route::get('/contact', [SiteController::class, 'getContact'])->name('contact');


    Route::post('/send-contact-message', 'SiteController@sendContactMessage')->name('send-contact-message');


});

