<?php

use App\Models\AboutSite;
use App\Models\AboutType;
use App\Models\FixedText;
use App\Models\Projects;
use App\Models\Service;
use App\Models\Setting;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

//  setting Helper Function
if (!function_exists('setting')) {
    function setting()
    {
        return Setting::orderBy('id', 'desc')->first();
    }
}


//  get visitor counter Helper Function
if (!function_exists('getVisitorCounter')) {
    function getVisitorCounter()
    {
        return Setting::orderBy('id', 'desc')->first()->visitors_counter;
    }
}

//  get active languages Helper Function
if (!function_exists('getActiveLanguages')) {
    function Lang()
    {
        return LaravelLocalization::getCurrentLocale();
    }
}

//  get admin Helper Function
if (!function_exists('admin')) {
    function admin()
    {
        return auth()->guard('admin');
    }
}

function reverseDate($date)
{
    $array = explode('-', $date);
    $rev = array_reverse($array);
    $date = implode('-', $rev);
    return $date;
}

function slug($string)
{
    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
    return preg_replace('/[^\w\s\-]+/u', '', $string);
}

function returnSpaceBetweenString($string)
{
    return $string = str_replace('-', ' ', $string); // Replaces all spaces with hyphens.
}

//  about site Helper Function
if (!function_exists('aboutSite')) {
    function aboutSite()
    {
        return AboutSite::orderBy('id', 'desc')->first();
    }
}

// fixed texts function
if (!function_exists('fixedTexts')) {
    function fixedTexts()
    {
        return App\Models\FixedText::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('getServicesOnly')) {
    function getServicesOnly()
    {
        $services = Service::whereStatus('on')->orderByDesc('created_at')->whereIsTreatmentArea('no')->get();
        return $services;
    }
}
