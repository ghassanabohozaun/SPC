<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\SupportCenterRequest;
use App\Models\Slider;
use App\Models\SupportCenter;
use App\Traits\GeneralTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

        return view('site.index', compact('title', 'sliders'));
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

    // About
    // public function about($name)
    // {
    //     // return current name
    //     $name = returnSpaceBetweenString($name);
    //     $title = $name;
    //     $about_type = AboutType::where('name_' . Lang(), $name)->first();
    //     if (!$about_type) {
    //         return redirect(route('index'));
    //     }
    //     $about = About::status()->where('about_type_id', $about_type->id)->first();
    //     if ($about) {
    //         return view('site.about', compact('about', 'about_type', 'title'));
    //     } else {
    //         return view('site.about', compact('about_type', 'title'));
    //     }
    // }

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
