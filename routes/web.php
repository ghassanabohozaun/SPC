<?php

use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'namespace' => 'Site',
        'middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {


        ////////////////////////////////////////////////////////////
        /// any
        Route::get('', function () {
            return view('site.index');
        })->where(['any' => '.*']);

        // about spa
        Route::get('/', [SiteController::class, 'index'])->name('index');
        Route::get('/about-spa', [SiteController::class, 'aboutSpa'])->name('about.spa');

        // services
        Route::get('/services', [SiteController::class, 'services'])->name('services');
        Route::get('/service/{val?}', [SiteController::class, 'service'])->name('service');

        //contact
        Route::get('/contact', [SiteController::class, 'contact'])->name('contact');
        Route::post('/send-contact', [SiteController::class, 'sendContact'])->name('send.contact');

        // appointment
        Route::get('/appointment', [SiteController::class, 'appointment'])->name('appointment');
        Route::post('/booking-appointment', [SiteController::class, 'bookingAppointment'])->name('booking.appointment');

        // faq
        Route::get('/faq', [SiteController::class, 'faq'])->name('faq');

        //trainings
        Route::get('/trainings', [SiteController::class, 'trainings'])->name('trainings');
        Route::get('/training-paging', [SiteController::class, 'trainingsPaging'])->name('trainings.paging');

        // videos
        Route::get('/videos', [SiteController::class, 'videos'])->name('videos');
        Route::get('/videos-paging', [SiteController::class, 'videosPaging'])->name('videos.paging');

        // photos
        Route::get('/photo-albums', [SiteController::class, 'photoAlbums'])->name('photo.albums');
        Route::get('/photo-albums-paging', [SiteController::class, 'photoAlbumsPaging'])->name('photo.albums.paging');

        // testimonials
        Route::get('/testimonials', [SiteController::class, 'testimonials'])->name('testimonials');
        Route::get('testimonialsFilterByYear', [SiteController::class, 'testimonialsFilterByYear'])->name('testimonials.filter.by.year');
        Route::get('/testimonial-paging', [SiteController::class, 'testimonialPaging'])->name('testimonial.paging');
        Route::post('/send-testimonial', [SiteController::class, 'sendTestimonial'])->name('send.testimonial');

        // articles
        Route::get('/articles', [SiteController::class, 'articles'])->name('articles');
        Route::get('/articles-paging', [SiteController::class, 'articlesPaging'])->name('articles.paging');
        Route::get('/article/{val?}', [SiteController::class, 'article'])->name('article');

        // news
        Route::get('/news', [SiteController::class, 'news'])->name('news');
        Route::get('/news-paging', [SiteController::class, 'newsPaging'])->name('news.paging');
        Route::get('/new/{val?}', [SiteController::class, 'new'])->name('new');

        // books
        Route::get('/books', [SiteController::class, 'books'])->name('books');
        Route::get('/books-paging', [SiteController::class, 'booksPaging'])->name('books.paging');
        Route::get('/book/{val?}', [SiteController::class, 'book'])->name('book');

        // posters
        Route::get('/posters', [SiteController::class, 'posters'])->name('posters');
        Route::get('/posters-paging', [SiteController::class, 'postersPaging'])->name('posters.paging');
        Route::get('/poster/{val?}', [SiteController::class, 'poster'])->name('poster');






        Route::get('/get-treatment-area', [SiteController::class, 'getTreatmentAreas'])->name('get.treatment.area');

        // tests
        Route::get('/tests', [SiteController::class, 'tests'])->name('tests');
        Route::get('/tests-paging', [SiteController::class, 'testsPaging'])->name('tests.paging');
        Route::get('/get-test-details/{id?}', [SiteController::class, 'getTestDetails'])->name('get.test.details');
        Route::get('/get-test-paging/{id?}', [SiteController::class, 'getTestPaging'])->name('get.test.paging');
        Route::get('/get-test-metric/{id?}/{val?}', [SiteController::class, 'getTestMetric'])->name('get.test.metric');

        Route::get('/test/{val?}', [SiteController::class, 'test'])->name('test');
        Route::get('/get-test-questions/{testID?}', [SiteController::class, 'getTestQuestions'])->name('get.test.questions');
        Route::get('/get-question-answer/{questionID?}', [SiteController::class, 'getQuestionAnswers'])->name('get.questions.answers');

        Route::get('/reload-captcha', [SiteController::class, 'reloadCaptcha'])->name('reload.captcha');

        // external link
        //Route::get('/link/{link}/{id}', [SiteController::class, 'externalLink'])->name('site.external.link');

    }
);
