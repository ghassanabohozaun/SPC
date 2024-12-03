<?php
use App\Models\AboutType;
use App\Models\Projects;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


//  setting Helper Function
if (!function_exists('setting')) {
    function setting()
    {
        return App\Models\Setting::orderBy('id', 'desc')->first();
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
    $array = explode("-", $date);
    $rev = array_reverse($array);
    $date = implode("-", $rev);
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

function abouts_type(){
    return AboutType::get();
}



function fixedTexts()
{
    return App\Models\FixedText::orderBy('id', 'desc')->first();
}

function projects(){
   return   Projects::orderByDesc('id')->where('status' ,'on')->where('type' ,'current')->where(function ($q) {
        if(LaravelLocalization::getCurrentLocale() == 'ar'){
            $q->where('language', 'ar')
            ->orWhere('language', 'ar_en');
        }else{
            $q->orWhere('language', 'ar_en');
        }
   })->limit(4)->get() ;
}

