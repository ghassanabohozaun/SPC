<?php

use App\Http\Controllers\Admin\AboutSpcController;
use App\Http\Controllers\Admin\ArticlesController;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PhotoAlbumsController;
use App\Http\Controllers\Admin\PostersController;
use App\Http\Controllers\Admin\PublicationsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\SlidersController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\TrainingController;
use App\Http\Controllers\Admin\VideosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AboutSiteController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
////////////////////////////////////////////////////////////////////////
/// auth  => that mean : must be admin and login
///

Route::group(
    [
        'namespace' => 'Admin',
        'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        //////////////////////////////////////////////////////////////////
        /// not found page
        Route::get('/notFound', 'DashboardController@notFound')->name('admin.not.found');

        /////////////////////////////////////////////////////////////////////////////////////////////
        /// dashboard
        Route::get('/', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');
        Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');

        /////////////////////////////////////////////////////////////////////////////////////////////
        /// settings

        Route::group(['middleware' => 'can:settings'], function () {
            Route::get('settings', 'SettingsController@index')->name('get.admin.settings')->middleware('can:settings');
            Route::post('settings', 'SettingsController@storeSettings')->name('store.admin.settings')->middleware('can:settings');
            Route::post('switch-ar-lang', 'SettingsController@switchArabicLang')->name('switch.arabic.lang');
            Route::post('switch-frontend-lang', 'SettingsController@switchFrontendLang')->name('switch.frontend.lang');
        });

        /////////////////////////////////////////////////////////////////////////////////////////////
        /// admin routes
        Route::group(['middleware' => 'can:admins'], function () {
            Route::get('/admin', 'AdminsController@index')->name('get.admin')->middleware('can:admins');
            Route::get('/get-admin-by-id', 'AdminsController@getAdminById')->name('get.admin.by.id');
            Route::post('/admin-update', 'AdminsController@adminUpdate')->name('admin.update');
        });

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
        // home
        Route::group(['prefix' => 'landing-page', 'middleware' => 'can:landing-page'], function () {
            // sliders routes
            Route::group(['prefix' => 'sliders'], function () {
                Route::get('/', [SlidersController::class, 'index'])->name('admin.sliders');
                Route::get('/create', [SlidersController::class, 'create'])->name('admin.sliders.create');
                Route::post('/store', [SlidersController::class, 'store'])->name('admin.sliders.store');
                Route::post('/destroy', [SlidersController::class, 'destroy'])->name('admin.sliders.destroy');
                Route::get('/trashed', [SlidersController::class, 'trashed'])->name('admin.sliders.trashed');
                Route::post('/restore', [SlidersController::class, 'restore'])->name('admin.sliders.restore');
                Route::post('/force-delete', [SlidersController::class, 'forceDelete'])->name('admin.sliders.force.delete');
                Route::get('/edit/{id}', [SlidersController::class, 'edit'])->name('admin.sliders.edit');
                Route::post('/update', [SlidersController::class, 'update'])->name('admin.sliders.update');
                Route::post('/change-status', [SlidersController::class, 'changeStatus'])->name('admin.sliders.change.status');
            });
        });

        /////////////////////////////////////////////////////////////////////////////////////////////
        // about
        Route::group(['prefix' => 'about', 'middleware' => 'can:about'], function () {
            // about spc routes
            Route::group(['prefix' => 'about-spc'], function () {
                Route::get('/', [AboutSpcController::class, 'index'])->name('admin.about.spc');
                Route::get('/create', [AboutSpcController::class, 'create'])->name('admin.about.spc.create');
                Route::post('/store', [AboutSpcController::class, 'store'])->name('admin.about.spc.store');
                Route::post('/destroy', [AboutSpcController::class, 'destroy'])->name('admin.about.spc.destroy');
                Route::get('/edit/{id}', [AboutSpcController::class, 'edit'])->name('admin.about.spc.edit');
                Route::post('/update', [AboutSpcController::class, 'update'])->name('admin.about.spc.update');
                Route::post('/change-status', [AboutSpcController::class, 'changeStatus'])->name('admin.about.spc.change.status');
            });

            Route::group(['prefix' => 'about-site'], function () {
                Route::get('/', [AboutSiteController::class, 'index'])->name('admin.about.site');
                Route::post('/update', [AboutSiteController::class, 'update'])->name('admin.about.site.update');

            });
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
            Route::get('/edit/{id}', [TrainingController::class, 'edit'])->name('admin.trainings.edit');
            Route::post('/update', [TrainingController::class, 'update'])->name('admin.trainings.update');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
        // services routes
        Route::group(['prefix' => 'services', 'middllware' => 'can:services'], function () {
            Route::get('/', [ServicesController::class, 'index'])->name('admin.services');
            Route::post('/destroy', [ServicesController::class, 'destroy'])->name('admin.services.destroy');
            Route::post('/change-status', [ServicesController::class, 'changeStatus'])->name('admin.services.change.status');
            Route::get('/trashed', [ServicesController::class, 'getTrashed'])->name('admin.services.trashed');
            Route::post('/restore', [ServicesController::class, 'restore'])->name('admin.services.restore');
            Route::post('/force-delete', [ServicesController::class, 'forceDelete'])->name('admin.services.force.delete');
            Route::get('/create', [ServicesController::class, 'create'])->name('admin.services.create');
            Route::post('/store', [ServicesController::class, 'store'])->name('admin.services.store');
            Route::get('/edit/{id}', [ServicesController::class, 'edit'])->name('admin.services.edit');
            Route::post('/update', [ServicesController::class, 'update'])->name('admin.services.update');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // testimonials routes
        Route::group(['prefix' => 'testimonials', 'middleware' => 'can:testimonials'], function () {
            Route::get('/', [TestimonialsController::class, 'index'])->name('admin.testimonials');
            Route::get('/create', [TestimonialsController::class, 'create'])->name('admin.testimonial.create');
            Route::post('/store', [TestimonialsController::class, 'store'])->name('admin.testimonial.store');
            Route::get('/edit/{id?}', [TestimonialsController::class, 'edit'])->name('admin.testimonial.edit');
            Route::post('/update', [TestimonialsController::class, 'update'])->name('admin.testimonial.update');
            Route::post('/destroy', [TestimonialsController::class, 'destroy'])->name('admin.testimonial.destroy');
            Route::get('/trashed', [TestimonialsController::class, 'trashed'])->name('admin.testimonial.trashed');
            Route::post('/force-delete', [TestimonialsController::class, 'forceDelete'])->name('admin.testimonial.force.delete');
            Route::post('/restore', [TestimonialsController::class, 'restore'])->name('admin.testimonial.restore');
            Route::post('/change-status', [TestimonialsController::class, 'changeStatus'])->name('admin.testimonial.change-status');
        });

        /////////////////////////////////////////////////////////////////////////////////////////////
        /// articles  routes
        Route::group(['prefix' => 'articles', 'middleware' => 'can:articles'], function () {
            Route::get('/', [ArticlesController::class, 'index'])->name('admin.articles');
            Route::get('/create', [ArticlesController::class, 'create'])->name('admin.articles.create');
            Route::post('/store', [ArticlesController::class, 'store'])->name('admin.articles.store');
            Route::get('/edit/{id?}', [ArticlesController::class, 'edit'])->name('admin.articles.edit');
            Route::post('/update', [ArticlesController::class, 'update'])->name('admin.articles.update');
            Route::post('/destroy', [ArticlesController::class, 'destroy'])->name('admin.articles.destroy');
            Route::get('/trashed', [ArticlesController::class, 'trashed'])->name('admin.articles.trashed');
            Route::post('/force-delete', [ArticlesController::class, 'forceDelete'])->name('admin.articles.force.delete');
            Route::post('/restore', [ArticlesController::class, 'restore'])->name('admin.articles.restore');
            Route::post('/change-status', [ArticlesController::class, 'changeStatus'])->name('admin.articles.change.status');

            // comments
            Route::get('/comments/{id}', [CommentsController::class, 'index'])->name('admin.comments');
            Route::get('/create-comment/{id}', [CommentsController::class, 'create'])->name('admin.comments.create');
            Route::post('/comment-store', [CommentsController::class, 'store'])->name('admin.comments.store');
            Route::post('/comment-destroy', [CommentsController::class, 'destroy'])->name('admin.comments.destroy');
            Route::get('/comment-trashed/{id}', [CommentsController::class, 'trashed'])->name('admin.comments.trashed');
            Route::post('/comment-force-delete', [CommentsController::class, 'forceDelete'])->name('admin.comments.force.delete');
            Route::post('/comment-restore', [CommentsController::class, 'restore'])->name('admin.comments.restore');
            Route::post('/comment-change-status', [CommentsController::class, 'changeStatus'])->name('admin.comments.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // publications routes
        Route::group(['prefix' => 'publications', 'middleware' => 'can:publications'], function () {
            Route::get('/', [PublicationsController::class, 'index'])->name('admin.publications');
            Route::get('/create', [PublicationsController::class, 'create'])->name('admin.publications.create');
            Route::post('/store', [PublicationsController::class, 'store'])->name('admin.publications.store');
            Route::get('/edit/{id?}', [PublicationsController::class, 'edit'])->name('admin.publications.edit');
            Route::post('/update', [PublicationsController::class, 'update'])->name('admin.publications.update');
            Route::post('/destroy', [PublicationsController::class, 'destroy'])->name('admin.publications.destroy');
            Route::get('/trashed', [PublicationsController::class, 'trashed'])->name('admin.publications.trashed');
            Route::post('/force-delete', [PublicationsController::class, 'forceDelete'])->name('admin.publications.force.delete');
            Route::post('/restore', [PublicationsController::class, 'restore'])->name('admin.publications.restore');
            Route::post('/change-status', [PublicationsController::class, 'changeStatus'])->name('admin.publications.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // news routes
        Route::group(['prefix' => 'news', 'middleware' => 'can:news'], function () {
            Route::get('/', [NewsController::class, 'index'])->name('admin.news');
            Route::get('/create', [NewsController::class, 'create'])->name('admin.news.create');
            Route::post('/store', [NewsController::class, 'store'])->name('admin.news.store');
            Route::get('/edit/{id?}', [NewsController::class, 'edit'])->name('admin.news.edit');
            Route::post('/update', [NewsController::class, 'update'])->name('admin.news.update');
            Route::post('/destroy', [NewsController::class, 'destroy'])->name('admin.news.destroy');
            Route::get('/trashed', [NewsController::class, 'trashed'])->name('admin.news.trashed');
            Route::post('/force-delete', [NewsController::class, 'forceDelete'])->name('admin.news.force.delete');
            Route::post('/restore', [NewsController::class, 'restore'])->name('admin.news.restore');
            Route::post('/change-status', [NewsController::class, 'changeStatus'])->name('admin.news.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // posters routes
        Route::group(['prefix' => 'posters', 'middleware' => 'can:posters'], function () {
            Route::get('/', [PostersController::class, 'index'])->name('admin.posters');
            Route::get('/create', [PostersController::class, 'create'])->name('admin.posters.create');
            Route::post('/store', [PostersController::class, 'store'])->name('admin.posters.store');
            Route::get('/edit/{id?}', [PostersController::class, 'edit'])->name('admin.posters.edit');
            Route::post('/update', [PostersController::class, 'update'])->name('admin.posters.update');
            Route::post('/destroy', [PostersController::class, 'destroy'])->name('admin.posters.destroy');
            Route::get('/trashed', [PostersController::class, 'trashed'])->name('admin.posters.trashed');
            Route::post('/force-delete', [PostersController::class, 'forceDelete'])->name('admin.posters.force.delete');
            Route::post('/restore', [PostersController::class, 'restore'])->name('admin.posters.restore');
            Route::post('/change-status', [PostersController::class, 'changeStatus'])->name('admin.posters.change.status');
        });

        ///////////////////////////////////////////////////////////////////////////////////////////
        // books routes
        Route::group(['prefix' => 'books', 'middleware' => 'can:books'], function () {
            Route::get('/', [BooksController::class, 'index'])->name('admin.books');
            Route::get('/create', [BooksController::class, 'create'])->name('admin.books.create');
            Route::post('/store', [BooksController::class, 'store'])->name('admin.books.store');
            Route::get('/edit/{id?}', [BooksController::class, 'edit'])->name('admin.books.edit');
            Route::post('/update', [BooksController::class, 'update'])->name('admin.books.update');
            Route::post('/destroy', [BooksController::class, 'destroy'])->name('admin.books.destroy');
            Route::get('/trashed', [BooksController::class, 'trashed'])->name('admin.books.trashed');
            Route::post('/force-delete', [BooksController::class, 'forceDelete'])->name('admin.books.force.delete');
            Route::post('/restore', [BooksController::class, 'restore'])->name('admin.books.restore');
            Route::post('/change-status', [BooksController::class, 'changeStatus'])->name('admin.books.change.status');
        });

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
    },
);

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
