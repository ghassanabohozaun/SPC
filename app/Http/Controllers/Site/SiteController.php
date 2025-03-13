<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportCenterRequest;
use App\Http\Requests\TestimonialRequestFront;
use App\Models\AboutSpc;
use App\Models\Article;
use App\Models\Book;
use App\Models\FAQ;
use App\Models\MyNew;
use App\Models\PhotoAlbum;
use App\Models\Poster;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SupportCenter;
use App\Models\Test;
use App\Models\Testimonial;
use App\Models\TestQuestion;
use App\Models\TestScale;
use App\Models\Training;
use App\Models\Video;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SiteController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        if (Lang() == 'ar') {
            $title = setting()->site_name_ar;
        } else {
            $title = setting()->site_name_en;
        }

        $sliders = $this->getSliders();
        $services = $this->getServices();
        $offers = $this->getOffers();
        $latest_news = $this->latestNews(3);

        $testimonials = $this->getTestimonials();

        return view('site.index', compact('title', 'sliders', 'services', 'offers', 'testimonials', 'latest_news'));
    }

    // get sliders
    public function getSliders()
    {
        if (Lang() == 'ar') {
            // Slider
            $sliders = Slider::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('order')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->get();
        } else {
            //Slider
            $sliders = Slider::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('order')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return $sliders;
    }

    // get services
    public function getServices()
    {
        // is_treatment_area => 1  Offers
        // is_treatment_area => 0   services

        if (Lang() == 'ar') {
            $services = Service::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->whereIsTreatmentArea('no')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->get();
        } else {
            $services = Service::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->whereIsTreatmentArea('no')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return $services;
    }

    // get offers
    public function getOffers()
    {
        // is_treatment_area => 1  Offers
        // is_treatment_area => 0   services

        if (Lang() == 'ar') {
            $offers = Service::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->whereIsTreatmentArea('yes')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->get();
        } else {
            $offers = Service::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->whereIsTreatmentArea('yes')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return $offers;
    }

    // get testimonials
    public function getTestimonials()
    {
        if (Lang() == 'ar') {
            $testimonials = Testimonial::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->get();
        } else {
            $testimonials = Testimonial::withoutTrashed()
                ->whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return $testimonials;
    }

    // about spc
    public function aboutSpa()
    {
        $title = __('site.about_spa');

        if (Lang() == 'ar') {
            $aboutSpaItems = AboutSpc::whereStatus('on')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->get();
        } else {
            $aboutSpaItems = AboutSpc::whereStatus('on')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return view('site.about-spa', compact('title', 'aboutSpaItems'));
    }

    // services
    public function services()
    {
        $title = __('site.services');

        if (Lang() == 'ar') {
            $services = Service::whereStatus('on')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->get();
        } else {
            $services = Service::whereStatus('on')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return view('site.services', compact('title', 'services'));
    }

    // service
    public function service($serviceTitle = null)
    {
        if (!$serviceTitle) {
            return redirect()->route('index');
        }

        if (Lang() == 'ar') {
            $service = Service::where('title_ar_slug', '=', $serviceTitle)->first();
            if (!$service) {
                return redirect()->route('index');
            }
        } else {
            $service = Service::where('title_en_slug', '=', $serviceTitle)->first();
            if (!$service) {
                return redirect()->route('index');
            }
        }

        return view('site.service', compact('service'));
    }

    // faq
    public function faq()
    {
        $title = __('index.faq');

        if (Lang() == 'ar') {
            $faqs = FAQ::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->get();
        } else {
            $faqs = FAQ::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->get();
        }

        return view('site.faq', compact('title', 'faqs'));
    }


    // tests
    public function tests()
    {
        $title = __('site.tests');

        if (Lang() == 'ar') {
            $tests  = Test::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->whereLanguage('ar_en');
                })->paginate(5);
        } else {
            $tests  = Test::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->whereLanguage('ar_en')->orWhere('language', 'en');
                })->paginate(5);
        }

        return view('site.tests.tests', compact('title', 'tests'));
    }


    // tests paging
    public function testsPaging()
    {

        if (Lang() == 'ar') {
            $tests  = Test::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->whereLanguage('ar_en');
                })->paginate(5);
        } else {
            $tests  = Test::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->whereLanguage('ar_en')->orWhere('language', 'en');
                })->paginate(5);
        }

        return view('site.tests.tests-paging', compact('tests'))->render();
    }

    // get Test Details
    public function getTestDetails($val = null)
    {
        if (!$val) {
            return redirect()->route('tests');
        }

        $test = Test::with('questions')->with('answers')->where('test_name_slug', $val)->first();
        if (!$test) {
            return redirect()->route('tests');
        }

        $questions = TestQuestion::orderBy('id', 'asc')->where('test_id', $test->id)->paginate(1);
        $id = $test->id;

        return view('site.tests.test-details', compact('id', 'test', 'questions'));
    }

    // get test metric
    public function getTestMetric($id = null, $val = null)
    {
        $metric = TestScale::where('test_id', $id)->where('minimum', '<=', $val)->where('maximum', '>=', $val)->first();

        $test = Test::find($id);

        $test->update([
            'number_times_of_use' => $test->number_times_of_use + 1,
        ]);

        return response()->json($metric);
    }

    // get Test paging
    public function getTestPaging($id = null)
    {
        $test = Test::with('questions')->find($id);
        $questions = TestQuestion::orderBy('id', 'asc')->where('test_id', $test->id)->paginate(1);
        return view('site.tests.test-paging', compact('test', 'questions'))->render();
    }

    // trainings
    public function trainings()
    {
        $title = __('index.trainings');
        if (Lang() == 'ar') {
            $trainings = Training::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $trainings = Training::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }

        return view('site.trainings.trainings', compact('title', 'trainings'));
    }
    // trainings paging
    public function trainingsPaging()
    {
        if (Lang() == 'ar') {
            $trainings = Training::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $trainings = Training::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }

        return view('site.trainings.trainings-paging', compact('trainings'))->render();
    }

    // videos
    public function videos()
    {
        $title = __('index.videos');
        if (Lang() == 'ar') {
            $videos = Video::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $videos = Video::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.videos.videos', compact('title', 'videos'));
    }

    // videos paging
    public function videosPaging()
    {
        if (Lang() == 'ar') {
            $videos = Video::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $videos = Video::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.videos.videos-paging', compact('videos'))->render();
    }

    // photo albums
    public function photoAlbums()
    {
        $title = __('index.photos_album');
        if (Lang() == 'ar') {
            $photoAlbums = PhotoAlbum::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $photoAlbums = PhotoAlbum::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.photos.photo-albums', compact('title', 'photoAlbums'));
    }

    // photos paging
    public function photoAlbumsPaging()
    {
        $title = __('index.photos_album');
        if (Lang() == 'ar') {
            $photoAlbums = PhotoAlbum::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $photoAlbums = PhotoAlbum::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.photos.photo-albums-paging', compact('photoAlbums'))->render();
    }

    // articles
    public function articles()
    {
        $title = __('index.articles');
        $latest_news = $this->latestNews(5);
        if (Lang() == 'ar') {
            $articles = Article::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $articles = Article::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.articles.articles', compact('title', 'articles', 'latest_news'));
    }

    // articles paging
    public function articlesPaging()
    {
        if (Lang() == 'ar') {
            $articles = Article::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $articles = Article::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.articles.articles-paging', compact('articles'))->render();
    }

    //article
    public function article($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }
        if (Lang() == 'ar') {
            $article = Article::where('title_ar_slug', $val)->first();
            if (!$article) {
                return redirect()->route('index');
            }
        } else {
            $article = Article::where('title_en_slug', $val)->first();
            if (!$article) {
                return redirect()->route('index');
            }
        }
        $latest_news = $this->latestNews(5);

        return view('site.articles.article', compact('article', 'latest_news'));
    }

    // news
    public function news()
    {
        $title = __('index.news');
        $latest_news = $this->latestNews(5);
        if (Lang() == 'ar') {
            $news = MyNew::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $news = MyNew::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.news.news', compact('title', 'news', 'latest_news'));
    }

    // news paging
    public function newsPaging()
    {
        if (Lang() == 'ar') {
            $news = MyNew::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $news = MyNew::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.news.news-paging', compact('news'))->render();
    }

    //new
    public function new($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }
        if (Lang() == 'ar') {
            $new = MyNew::where('title_ar_slug', $val)->first();
            if (!$new) {
                return redirect()->route('index');
            }
        } else {
            $new = MyNew::where('title_en_slug', $val)->first();
            if (!$new) {
                return redirect()->route('index');
            }
        }
        $latest_news = $this->latestNews(5);

        return view('site.news.new', compact('new', 'latest_news'));
    }

    // books
    public function books()
    {
        $title = __('index.books');
        $latest_news = $this->latestNews(5);
        if (Lang() == 'ar') {
            $books = Book::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $books = Book::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.books.books', compact('title', 'books', 'latest_news'));
    }

    // books paging
    public function booksPaging()
    {
        if (Lang() == 'ar') {
            $books = Book::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $books = Book::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.books.books-paging', compact('books'))->render();
    }

    //book
    public function book($val = null)
    {
        if (!$val) {
            return redirect()->route('index');
        }
        if (Lang() == 'ar') {
            $book = Book::where('title_ar_slug', $val)->first();
            if (!$book) {
                return redirect()->route('index');
            }
        } else {
            $book = Book::where('title_en_slug', $val)->first();
            if (!$book) {
                return redirect()->route('index');
            }
        }
        $latest_news = $this->latestNews(5);

        return view('site.books.book', compact('book', 'latest_news'));
    }


    // posters
    public function posters()
    {
        $title = __('index.posters');
        $latest_news = $this->latestNews(5);
        if (Lang() == 'ar') {
            $posters = Poster::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $posters = Poster::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.posters.posters', compact('title', 'posters', 'latest_news'));
    }

    // posters paging
    public function postersPaging()
    {
        if (Lang() == 'ar') {
            $posters = Poster::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(3);
        } else {
            $posters = Poster::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('language', 'en');
                })
                ->paginate(3);
        }

        return view('site.posters.posters-paging', compact('posters'))->render();
    }


    // latest news
    public function latestNews($val = null)
    {

        if (Lang() == 'ar') {
            $news = MyNew::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->take($val)->get();
        } else {
            $news = MyNew::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en')->orWhere('Language', 'en');
                })
                ->take($val)->get();
        }


        return $news;
    }
    // testimonials
    public function testimonials()
    {
        $title = __('index.testimonials');
        if (Lang() == 'ar') {
            $testimonials = Testimonial::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $testimonials = Testimonial::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.testimonials.testimonials', compact('title', 'testimonials'));
    }

    // testimonials paging
    public function testimonialPaging()
    {
        if (Lang() == 'ar') {
            $testimonials = Testimonial::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $testimonials = Testimonial::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }
        return view('site.testimonials.testimonial-paging', compact('testimonials'))->render();
    }

    // testimonials filter by year
    public function testimonialsFilterByYear(Request $request)
    {
        if ($request->ajax()) {
            if ($request->year == null) {
                $data = Testimonial::whereStatus('on')->orderByDesc('created_at')->paginate(6);
            } else {
                $data = Testimonial::whereStatus('on')->orderByDesc('created_at')->whereYear('created_at', '=', $request->year)->paginate(6);
            }

            $output = '';

            if (count($data) > 0) {
                $output = '<div class="testimonial">';

                foreach ($data as $row) {
                    $output .= ' <div class="testimonial-text testimonial-block">';
                    if ($row->photo == null) {
                        if ($row->gender == 'male') {
                            $output .= '<img src="' . asset('site/assets/images/male.jpeg') . '" alt=""  class="my_testimonial_img">';
                        } else {
                            $output .= '<img src="' . asset('site/assets/images/female.jpeg') . '" alt=""  class="my_testimonial_img">';
                        }
                    } else {
                        $output .= '<img src="' . asset('adminBoard/uploadedImages/testimonials/' . $row->photo) . '" alt=""  class="my_testimonial_img">';
                    }
                    if (Lang() == 'ar') {
                        $output .=
                            '<p>' .
                            $row->opinion_ar .
                            '</p>
                          <h6>' .
                            $row->name_ar .
                            '
                           - <span>' .
                            $row->job_title_ar .
                            '</span></h6>
                          <h6>';
                    } else {
                        $output .=
                            '<p>' .
                            $row->opinion_en .
                            '</p>
                          <h6>' .
                            $row->name_en .
                            '
                           - <span>' .
                            $row->job_title_en .
                            '</span></h6>
                          <h6>';
                    }

                    for ($i = 1; $i <= $row->rating; $i++) {
                        $output .= '<img src="' . asset('site/assets/images/icons/star.png') . '">';
                    }
                    $output .= '</h6></div><div class="clearfix"></div>';
                }
                $output .= ' <div class="container-fluid text-center"> <div class="row">' . $data->links('vendor.pagination.bootstrap-4') . '</div></div>';
                $output .= '</div>';
            } else {
                $output .= ' <div class="testimonial-text testimonial-block"><div><h2   class="text-capitalize text-warning text-center">' . __('site.no_testimonials') . '</h2></div></div>';
            }

            return $output;
        }
    }

    public function sendTestimonial(TestimonialRequestFront $request)
    {
        if ($request->hasFile('photo')) {
            $photo_path = $request->file('photo')->store('Opinions');
        } else {
            $photo_path = '';
        }

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/testimonials');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }

        $site_lang_ar = setting()->site_lang_ar;

        Testimonial::create([
            'opinion_en' => $request->opinion_en,
            'opinion_ar' => $site_lang_ar == 'on' ? $request->opinion_ar : '',
            'name_en' => $request->name_en,
            'name_ar' => $site_lang_ar == 'on' ? $request->name_ar : null,
            'job_title_en' => $request->job_title_en,
            'job_title_ar' => $site_lang_ar == 'on' ? $request->job_title_ar : null,
            'age' => $request->age,
            'gender' => $request->gender,
            'country' => $request->country,
            'rating' => $request->rating,
            'status' => '',
            'photo' => $photo_path,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(trans('general.add_success_message'));
    }

    // contact
    public function contact()
    {
        $title = __('index.contact');
        return view('site.contact', compact('title'));
    }

    // Send Contact Message
    public function sendContact(SupportCenterRequest $request)
    {
        SupportCenter::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'title' => $request->title,
            'message' => $request->message,
        ]);
        return $this->returnSuccessMessage(trans('index.send_success_message'));
    }

    // Send Contact function
    public function sendContact2(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'captcha' => 'required|captcha',
            ]);

            $communication_sender = $request->name;
            $communication_mobile = $request->mobile;
            $communication_email = $request->email;
            $communication_title = $request->title;
            $communication_details = $request->message;

            $emailData = ['communication_email' => $communication_email, 'communication_title' => $communication_title, 'communication_details' => $communication_details, 'communication_sender' => $communication_sender, 'communication_mobile' => $communication_mobile];

            Mail::send('site.emails.contact-email', compact('emailData'), function ($message) use ($emailData) {
                $message->from($emailData['communication_email'], $emailData['communication_sender']);
                $message->to(config('websiteemail.mail'));
                $message->subject($emailData['communication_title']);
            });
            return $this->returnSuccessMessage(trans('site.success_send_contact_message'));
        }
    }

    // appointment
    public function appointment()
    {
        $title = __('index.book_an_appointment');
        return view('site.appointment', compact('title'));
    }

    /// Booking Appointment function
    public function bookingAppointment(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'captcha' => 'required|captcha',
            ]);

            $full_name = $request->full_name;
            $phone = $request->phone;
            $email = $request->email;
            $preferred_date = $request->preferred_date;
            $details = $request->details;

            $emailData = ['email' => $email, 'title' => 'Booking an appointment', 'details' => $details, 'full_name' => $full_name, 'phone' => $phone, 'preferred_date' => $preferred_date];

            Mail::send('site.emails.booking-appointment-email', compact('emailData'), function ($message) use ($emailData) {
                $message->from($emailData['email'], $emailData['full_name']);
                $message->to(config('websiteemail.mail'));
                $message->subject($emailData['title']);
            });
            return $this->returnSuccessMessage(trans('site.success_booking_message'));
        }
    }

    //  external link
    public function externalLink($link, $id)
    {
        return view($link, compact('id'));
    }

    // reload Captcha
    public function reloadCaptcha()
    {
        return response()->json(['captcha' => captcha_img()]);
    }
}
