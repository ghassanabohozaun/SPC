<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportCenterRequest;
use App\Models\AboutSpc;
use App\Models\FAQ;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SupportCenter;
use App\Models\Testimonial;
use App\Models\Training;
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

        $testimonials = $this->getTestimonials();

        return view('site.index', compact('title', 'sliders', 'services', 'offers', 'testimonials'));
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
            $title = $service->title_ar;
        } else {
            $service = Service::where('title_en_slug', '=', $serviceTitle)->first();
            if (!$service) {
                return redirect()->route('index');
            }
            $title = $service->title_en;
        }

        return view('site.service', compact('title', 'service'));
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

    // trainings
    public function trainings(){
     $title  = __('index.trainings');
     if (Lang() == 'ar') {
        $trainings  = Training::whereStatus('on')
            ->orderByDesc('created_at')
            ->where(function ($q) {
                $q->where('language', 'ar_en');
            })
            ->paginate(6);
    } else {
        $trainings  = Training::whereStatus('on')
            ->orderByDesc('created_at')
            ->where(function ($q) {
                $q->where('language', 'en')->orWhere('language', 'ar_en');
            })
            ->paginate(6);
    }


    return view('site.trainings.trainings', compact('title','trainings'));

    }
    // trainings paging function
    public function trainingsPaging()
    {
        if (Lang() == 'ar') {
            $trainings  = Training::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'ar_en');
                })
                ->paginate(6);
        } else {
            $trainings  = Training::whereStatus('on')
                ->orderByDesc('created_at')
                ->where(function ($q) {
                    $q->where('language', 'en')->orWhere('language', 'ar_en');
                })
                ->paginate(6);
        }


        return view('site.trainings.trainings-paging', compact('trainings'))->render();
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
