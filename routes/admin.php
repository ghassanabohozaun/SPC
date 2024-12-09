<?php

use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\PhotoAlbumsController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\VideosController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
////////////////////////////////////////////////////////////////////////
/// auth  => that mean : must be admin and login
///

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    //////////////////////////////////////////////////////////////////
    /// not found page
    Route::get('/notFound', 'DashboardController@notFound')->name('admin.not.found');

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// settings
    Route::get('settings', 'SettingsController@index')->name('get.admin.settings')->middleware('can:settings');
    Route::post('settings', 'SettingsController@storeSettings')->name('store.admin.settings')->middleware('can:settings');
    Route::post('switch-ar-lang', 'SettingsController@switchArabicLang')->name('switch.arabic.lang');
    Route::post('switch-frontend-lang', 'SettingsController@switchFrontendLang')->name('switch.frontend.lang');

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Landing Page Routes
    Route::group(['prefix' => 'landing-page', 'middleware' => 'can:landing-page'], function () {
        /////////////////////////////////////////////////////////////////////////////////////////////
        /// Sliders routes
        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', 'SlidersController@index')->name('admin.sliders');
            Route::get('/create', 'SlidersController@create')->name('admin.sliders.create');
            Route::post('/store', 'SlidersController@store')->name('admin.slider.store');
            Route::get('/trashed', 'SlidersController@trashed')->name('admin.slider.trashed');
            Route::post('/destroy', 'SlidersController@destroy')->name('admin.slider.destroy');
            Route::post('/force-delete', 'SlidersController@forceDelete')->name('admin.slider.force.delete');
            Route::post('/restore', 'SlidersController@restore')->name('admin.slider.restore');
            Route::get('/edit/{id?}', 'SlidersController@edit')->name('admin.slider.edit');
            Route::post('/update', 'SlidersController@update')->name('admin.slider.update');
            Route::post('/change-status', 'SlidersController@changeStatus')->name('admin.slider.change.status');
        });

        /// fixed texts routes
        Route::get('/', 'FixedTextsController@index')->name('admin.fixed.texts');
        Route::post('/update', 'FixedTextsController@update')->name('admin.fixed.texts.update');

        /////////////////////////////////////////////////////////////////////////////////////////////
        /// Partners routes
        Route::group(['prefix' => 'partners'], function () {
            Route::get('/', 'PartnersController@index')->name('admin.partners');
            Route::get('/create', 'PartnersController@create')->name('admin.partner.create');
            Route::post('/store', 'PartnersController@store')->name('admin.partner.store');
            Route::get('/trashed', 'PartnersController@trashed')->name('admin.partner.trashed');
            Route::post('/destroy', 'PartnersController@destroy')->name('admin.partner.destroy');
            Route::post('/force-delete', 'PartnersController@forceDelete')->name('admin.partner.force.delete');
            Route::post('/restore', 'PartnersController@restore')->name('admin.partner.restore');
            Route::get('/edit/{id?}', 'PartnersController@edit')->name('admin.partner.edit');
            Route::post('/update', 'PartnersController@update')->name('admin.partner.update');
            Route::post('/change-status', 'PartnersController@changeStatus')->name('admin.partner.change.status');
        });
    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// admin routes
    Route::get('/admin', 'AdminsController@index')->name('get.admin')->middleware('can:admins');
    Route::get('/get-admin-by-id', 'AdminsController@getAdminById')->name('get.admin.by.id');
    Route::post('/admin-update', 'AdminsController@adminUpdate')->name('admin.update');

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// users routes
    Route::group(['prefix' => 'users', 'middleware' => 'can:users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::post('/destroy', 'UserController@destroy')->name('user.destroy');
        Route::post('/change-status', 'UserController@changeStatus')->name('user.change.status');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id?}', 'UserController@edit')->name('user.edit');
        Route::post('update', 'UserController@update')->name('user.update');
        Route::get('/trashed', 'UserController@trashed')->name('users.trashed');
        Route::post('/force-delete', 'UserController@forceDelete')->name('user.force.delete');
        Route::post('/restore', 'UserController@restore')->name('user.restore');
    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// roles routes
    Route::group(['prefix' => 'roles', 'middleware' => 'can:roles'], function () {
        Route::get('/', 'RolesController@index')->name('admin.roles');
        Route::get('/get-roles', 'RolesController@getRoles')->name('get.admin.roles');
        Route::get('/create', 'RolesController@create')->name('admin.role.create');
        Route::post('/store', 'RolesController@store')->name('admin.role.store');
        Route::post('/destroy', 'RolesController@destroy')->name('admin.role.destroy');
        Route::get('/edit/{id?}', 'RolesController@edit')->name('admin.role.edit');
        Route::post('/update', 'RolesController@update')->name('admin.role.update');
    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// videos routes
    Route::group(['prefix' => 'videos', 'middleware' => 'can:videos'], function () {
        Route::get('/', [VideosController::class, 'index'])->name('admin.videos');
        Route::get('/get-videos', [VideosController::class, 'getVideos'])->name('get.admin.video');
        Route::get('/create', [VideosController::class, 'create'])->name('admin.videos.create');
        Route::post('/store', [VideosController::class, 'store'])->name('admin.videos.store');
        Route::post('/destroy', [VideosController::class, 'destroy'])->name('admin.videos.destroy');
        Route::get('/trashed', [VideosController::class, 'trashed'])->name('admin.videos.trashed');
        Route::post('/restore', [VideosController::class, 'restore'])->name('admin.videos.restore');
        Route::post('/force-delete', [VideosController::class, 'forceDelete'])->name('admin.videos.force.delete');
        Route::get('/edit/{id}', [VideosController::class, 'edit'])->name('admin.videos.edit');
        Route::post('/update', [VideosController::class, 'update'])->name('admin.videos.update');
        Route::post('/change-status', [VideosController::class, 'changeStatus'])->name('admin.videos.change.status');
        Route::get('/view.video', [VideosController::class, 'viewVideo'])->name('admin.videos.view');
    });

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// photo albums routes
    Route::group(['prefix' => 'photo-albums', 'middleware' => 'can:photos'], function () {
        Route::get('/', [PhotoAlbumsController::class, 'index'])->name('admin.photo.albums');
        Route::get('/create', [PhotoAlbumsController::class, 'create'])->name('admin.photo.albums.create');
        Route::post('/store', [PhotoAlbumsController::class, 'store'])->name('admin.photo.albums.store');
        Route::post('/destroy', [PhotoAlbumsController::class, 'destroy'])->name('admin.photo.albums.destroy');
        Route::get('/trashed', [PhotoAlbumsController::class, 'trashed'])->name('admin.photo.albums.trashed');
        Route::post('/restore', [PhotoAlbumsController::class, 'restore'])->name('admin.photo.albums.restore');
        Route::post('/force-delete', [PhotoAlbumsController::class, 'forceDelete'])->name('admin.photo.albums.force.delete');
        Route::get('/edit/{id}', [PhotoAlbumsController::class, 'edit'])->name('admin.photo.albums.edit');
        Route::post('/update', [PhotoAlbumsController::class, 'update'])->name('admin.photo.albums.update');
        Route::get('/add-other-album-photos/{id}', [PhotoAlbumsController::class, 'addOtherAlbumPhotos'])->name('admin.add.other.album.photos');
        Route::post('/upload-other-album-photo/{paid}', [PhotoAlbumsController::class, 'uploadOtherAlbumPhotos'])->name('admin.upload.other.album.photos');
        Route::post('/delete-other-album-photo', [PhotoAlbumsController::class, 'deleteOtherAlbumPhoto'])->name('admin.delete.other.album.photo');
        Route::post('/change-status', [PhotoAlbumsController::class, 'changeStatus'])->name('admin.photo.albums.change.status');
    });

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    /// faq routes
    Route::group(['prefix' => 'faqs', 'middleware' => 'can:faqs'], function () {
        Route::get('/', [FAQController::class, 'index'])->name('admin.faqs');
        Route::get('/create', [FAQController::class, 'create'])->name('admin.faqs.create');
        Route::post('/store', [FAQController::class, 'store'])->name('admin.faqs.store');
        Route::get('/edit/{id}', [FAQController::class, 'edit'])->name('admin.faqs.edit');
        Route::post('/update', [FAQController::class, 'update'])->name('admin.faqs.update');
        Route::get('/trashed', [FAQController::class, 'trashed'])->name('admin.faqs.trashed');
        Route::post('/destroy', [FAQController::class, 'destroy'])->name('admin.faqs.destroy');
        Route::post('/force-delete', [FAQController::class, 'forceDelete'])->name('admin.faqs.force.delete');
        Route::post('/restore', [FAQController::class, 'restore'])->name('admin.faqs.restore');
        Route::post('/change-status', [FAQController::class, 'changeStatus'])->name('admin.faqs.change.status');
    });

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // trainings routes

    Route::group(['prefix' => 'trainings', 'middllware' => 'can:trainings'], function () {
        Route::get('/', [TrainingController::class, 'index'])->name('admin.trainings');
        Route::post('/destroy', [TrainingController::class, 'destroy'])->name('admin.trainings.destroy');
        Route::post('/change-status', [TrainingController::class, 'changeStatus'])->name('admin.trainings.change.status');
        Route::get('/trashed', [TrainingController::class, 'getTrashed'])->name('admin.trainings.trashed');
        Route::post('/restore', [TrainingController::class, 'restore'])->name('admin.trainings.restore');
        Route::post('/force-delete', [TrainingController::class, 'forceDelete'])->name('admin.trainings.force.delete');
        Route::get('/create', [TrainingController::class, 'create'])->name('admin.trainings.create');
        Route::post('/store', [TrainingController::class, 'store'])->name('admin.trainings.store');
        Route::get("/edit/{id}", [TrainingController::class, 'edit'])->name('admin.trainings.edit');
        Route::post('/update', [TrainingController::class, 'update'])->name('admin.trainings.update');
    });


    /////////////////////////////////////////////////////////////////////////////////////////////
    /// testimonials routes
    // Route::group(['prefix' => 'testimonials', 'middleware' => 'can:testimonials'], function () {
    //     Route::get('/', 'TestimonialController@index')->name('admin.testimonials');
    //     Route::get('/create', 'TestimonialController@create')->name('admin.testimonial.create');
    //     Route::post('/store', 'TestimonialController@store')->name('admin.testimonial.store');
    //     Route::get('/edit/{id?}', 'TestimonialController@edit')->name('admin.testimonial.edit');
    //     Route::post('/update', 'TestimonialController@update')->name('admin.testimonial.update');
    //     Route::post('/destroy', 'TestimonialController@destroy')->name('admin.testimonial.destroy');
    //     Route::get('/trashed', 'TestimonialController@trashed')->name('admin.testimonial.trashed');
    //     Route::post('/force-delete', 'TestimonialController@forceDelete')->name('admin.testimonial.force.delete');
    //     Route::post('/restore', 'TestimonialController@restore')->name('admin.testimonial.restore');
    //     Route::post('/change-status', 'TestimonialController@changeStatus')->name('admin.testimonial.change-status');
    // });

    // /////////////////////////////////////////////////////////////////////////////////////////////
    // /// support center routes
    // Route::group(['prefix' => 'support-center', 'middleware' => 'can:support-center'], function () {
    //     Route::get('/', 'SupportCenterController@index')->name('admin.support.center');
    //     Route::get('/get-support-center', 'SupportCenterController@getSupportCenter')->name('get.admin.support.center');
    //     Route::get('/create', 'SupportCenterController@create')->name('admin.support.center.create');
    //     Route::post('/send', 'SupportCenterController@send')->name('admin.support.center.send');
    //     Route::post('/destroy', 'SupportCenterController@destroy')->name('admin.support.center.message.destroy');
    //     Route::post('/change-status', 'SupportCenterController@changeStatus')->name('admin.support.center.change.status');
    //     Route::get('/get-one-message', 'SupportCenterController@getOneMessage')->name('admin.support.center.get.one.message');
    // });

    // /////////////////////////////////////////////////////////////////////////////////////////////
    // /// articles  routes
    // Route::group(['prefix' => 'articles', 'middleware' => 'can:articles'], function () {
    //     Route::get('/', 'ArticlesController@index')->name('admin.articles');
    //     Route::get('/create', 'ArticlesController@create')->name('admin.articles.create');
    //     Route::post('/store', 'ArticlesController@store')->name('admin.articles.store');
    //     Route::get('/edit/{id?}', 'ArticlesController@edit')->name('admin.articles.edit');
    //     Route::post('/update', 'ArticlesController@update')->name('admin.articles.update');
    //     Route::post('/destroy', 'ArticlesController@destroy')->name('admin.articles.destroy');
    //     Route::get('/trashed', 'ArticlesController@trashed')->name('admin.articles.trashed');
    //     Route::post('/force-delete', 'ArticlesController@forceDelete')->name('admin.articles.force.delete');
    //     Route::post('/restore', 'ArticlesController@restore')->name('admin.articles.restore');
    //     Route::post('/change-status', 'ArticlesController@changeStatus')->name('admin.articles.change.status');

    //     // comments
    //     Route::get('/comments/{id}', 'CommentsController@index')->name('admin.comments');
    //     Route::get('/create-comment/{id}', 'CommentsController@create')->name('admin.comments.create');
    //     Route::post('/comment-store', 'CommentsController@store')->name('admin.comments.store');
    //     Route::post('/comment-destroy', 'CommentsController@destroy')->name('admin.comments.destroy');
    //     Route::get('/comment-trashed/{id}', 'CommentsController@trashed')->name('admin.comments.trashed');
    //     Route::post('/comment-force-delete', 'CommentsController@forceDelete')->name('admin.comments.force.delete');
    //     Route::post('/comment-restore', 'CommentsController@restore')->name('admin.comments.restore');
    //     Route::post('/comment-change-status', 'CommentsController@changeStatus')->name('admin.comments.change.status');
    // });

    // /////////////////////////////////////////////////////////////////////////////////////////////
    // /// project routes
    // Route::group(['prefix' => 'project', 'middleware' => 'can:projects'], function () {
    //     Route::get('/', [ProjectsController::class, 'index'])->name('admin.project.index');
    //     Route::get('/create', [ProjectsController::class, 'create'])->name('admin.project.create');
    //     Route::post('/store', [ProjectsController::class, 'store'])->name('admin.project.store');
    //     Route::get('/edit/{id}', [ProjectsController::class, 'edit'])->name('admin.project.edit');
    //     Route::post('/update', [ProjectsController::class, 'update'])->name('admin.project.update');
    //     Route::get('/trashed-project', [ProjectsController::class, 'trashed'])->name('admin.project.trashed');
    //     Route::post('/destroy', [ProjectsController::class, 'destroy'])->name('admin.project.destroy');
    //     Route::post('/force-delete', [ProjectsController::class, 'forceDelete'])->name('admin.project.force.delete');
    //     Route::post('/restore', [ProjectsController::class, 'restore'])->name('admin.project.restore');
    //     Route::post('/change-status', [ProjectsController::class, 'changeStatus'])->name('admin.project.change.status');
    // });


    // /////////////////////////////////////////////////////////////////////////////////////////////
    // /// publication routes
    // Route::group(['prefix' => 'publication', 'middleware' => 'can:publications'], function () {
    //     Route::get('/', [PublicationsController::class, 'index'])->name('admin.publication.index');
    //     Route::get('/create', [PublicationsController::class, 'create'])->name('admin.publication.create');
    //     Route::post('/store', [PublicationsController::class, 'store'])->name('admin.publication.store');
    //     Route::get('/edit/{id}', [PublicationsController::class, 'edit'])->name('admin.publication.edit');
    //     Route::post('/update', [PublicationsController::class, 'update'])->name('admin.publication.update');
    //     Route::get('/trashed', [PublicationsController::class, 'trashed'])->name('admin.publication.trashed');
    //     Route::post('/destroy', [PublicationsController::class, 'destroy'])->name('admin.publication.destroy');
    //     Route::post('/force-delete', [PublicationsController::class, 'forceDelete'])->name('admin.publication.force.delete');
    //     Route::post('/restore', [PublicationsController::class, 'restore'])->name('admin.publication.restore');
    //     Route::post('/change-status', [PublicationsController::class, 'changeStatus'])->name('admin.publication.change.status');
    // });

    // /////////////////////////////////////////////////////////////////////////////////////////////
    // /// report routes
    // Route::group(['prefix' => 'report', 'middleware' => 'can:yearly-reports'], function () {
    //     Route::get('/', [ReportController::class, 'index'])->name('admin.report.index');
    //     Route::get('/create', [ReportController::class, 'create'])->name('admin.report.create');
    //     Route::post('/store', [ReportController::class, 'store'])->name('admin.report.store');
    //     Route::get('/edit/{id}', [ReportController::class, 'edit'])->name('admin.report.edit');
    //     Route::post('/update', [ReportController::class, 'update'])->name('admin.report.update');
    //     Route::get('/trashed', [ReportController::class, 'trashed'])->name('admin.report.trashed');
    //     Route::post('/destroy', [ReportController::class, 'destroy'])->name('admin.report.destroy');
    //     Route::post('/force-delete', [ReportController::class, 'forceDelete'])->name('admin.report.force.delete');
    //     Route::post('/restore', [ReportController::class, 'restore'])->name('admin.report.restore');
    //     Route::post('/change-status', [ReportController::class, 'changeStatus'])->name('admin.report.change.status');
    // });


    // /////////////////////////////////////////////////////////////////////////////////////////////
    // /// about routes
    // Route::group(['prefix' => 'about', 'middleware' => 'can:abouts'], function () {
    //     Route::get('/', [AboutController::class, 'index'])->name('admin.about.index');
    //     Route::get('/create', [AboutController::class, 'create'])->name('admin.about.create');
    //     Route::post('/store', [AboutController::class, 'store'])->name('admin.about.store');
    //     Route::get('/edit/{id}', [AboutController::class, 'edit'])->name('admin.about.edit');
    //     Route::post('/update', [AboutController::class, 'update'])->name('admin.about.update');
    //     Route::get('/trashed', [AboutController::class, 'trashed'])->name('admin.about.trashed');
    //     Route::post('/destroy', [AboutController::class, 'destroy'])->name('admin.about.destroy');
    //     Route::post('/force-delete', [AboutController::class, 'forceDelete'])->name('admin.about.force.delete');
    //     Route::post('/restore', [AboutController::class, 'restore'])->name('admin.about.restore');
    //     Route::post('/change-status', [AboutController::class, 'changeStatus'])->name('admin.about.change.status');
    // });


    // ///////////////////////////////////////////////////////////////////////////////////////////////////////////
    // /// team routes
    // Route::group(['prefix' => 'teams', 'middleware' => 'can:teams'], function () {
    //     Route::get('/', 'TeamController@index')->name('admin.teams');
    //     Route::get('/create', 'TeamController@create')->name('admin.team.member.create');
    //     Route::post('store', 'TeamController@store')->name('admin.team.member.store');
    //     route::get('/edit/{id?}', 'TeamController@edit')->name('admin.team.member.edit');
    //     route::post('/update', 'TeamController@update')->name('admin.team.member.update');
    //     Route::get('/trashed', 'TeamController@trashed')->name('admin.team.member.trashed');
    //     Route::post('/destroy', 'TeamController@destroy')->name('admin.destroy.team.member');
    //     Route::post('/force-delete', 'TeamController@forceDelete')->name('admin.team.member.force.delete');
    //     Route::post('/restore', 'TeamController@restore')->name('admin.team.member.restore');
    //     Route::post('/change-status', 'TeamController@changeStatus')->name('admin.team.member.change.status');
    // });


});


/////////////////////////////////////////////////////////////////////////////////////////////
/// Guest => that mean:must not be admin => because any one must be able to access login page
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('/', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('/', 'LoginController@doLogin')->name('admin.login');
    Route::get('/login2', function () {
        return view('admin.auth.login2');
    });
});
/////////////////////////////////////////////////////////////////////////////////////////////
/// Logout
Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');
