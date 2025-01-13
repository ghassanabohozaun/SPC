<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportCenterRequest;
use App\Models\AboutSpc;
use App\Models\Service;
use App\Models\Slider;
use App\Models\SupportCenter;
use App\Traits\GeneralTrait;

class SiteController extends Controller
{
    use GeneralTrait;

    ///index
    public function index()
    {
        if (Lang() == 'ar') {
            $title = setting()->site_name_ar;
        } else {
            $title = setting()->site_name_en;
        }

        $sliders = $this->getSliders();
        $services = $this->getServices();
        return view('site.index', compact('title', 'sliders', 'services'));
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
                ->orderByAsc('created_at')
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

        if(Lang() == 'ar'){
            $service = Service::where('title_ar_slug', '=', $serviceTitle)->first();
            if(!$service){
                return redirect()->route('index');
            }
            $title = $service->title_ar;
        }else{
            $service = Service::where('title_en_slug', '=', $serviceTitle)->first();
            if(!$service){
                return redirect()->route('index');
            }
            $title = $service->title_en;
        }


        return view('site.service', compact('title', 'service'));
    }

    // Send Contact Message
    public function sendContactMessage(SupportCenterRequest $request)
    {
        SupportCenter::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'title' => $request->title,
            'message' => $request->message,
        ]);
        return $this->returnSuccessMessage(trans('index.send_success_message'));
    }

    //  external link
    public function externalLink($link, $id)
    {
        return view($link, compact('id'));
    }
}
