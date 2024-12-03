<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Projects;
use App\Models\Setting;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = __('dashboard.admin_panel');
        $articles = Article::limit(6)->get();
        $comments = Comment::limit(6)->get();

           /// Article Chart
            $Articles = Article::select(DB::raw("Sum(views) as count"))
           ->whereYear('created_at', date('Y'))
           ->groupBy(DB::raw("Month(created_at)"))
           ->pluck('count');
            $ArticleMonths = Article::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
            $ArticleData = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach ($ArticleMonths as $index=>$month){
                $ArticleData[$month-1] = $Articles[$index];
            }
           
            /// Project Chart
            $Projects = Projects::select(DB::raw("Sum(views) as count"))
           ->whereYear('created_at', date('Y'))
           ->groupBy(DB::raw("Month(created_at)"))
           ->pluck('count');
            $ProjectMonths = Projects::select(DB::raw("Month(created_at) as month"))
                ->whereYear('created_at', date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('month');
            $ProjectData = array(0,0,0,0,0,0,0,0,0,0,0,0);
            foreach ($ProjectMonths as $index=>$month){
                $ProjectData[$month-1] = $Projects[$index];
            }
          

        return view('admin.dashboard', compact('title' , 'articles' , 'comments' , 'ArticleData' ,'ProjectData'));
    }
    ////////////////////////////////////////////////////////
    /// get Settings
    public function getSettings()
    {
        $title = __('settings.settings');
        return view('admin.settings', compact('title'));
    }
    ////////////////////////////////////////////////////////
    /// store Settings
    public function storeSettings(SettingRequest $request)
    {

        $settings = Setting::get();
        if ($settings->isEmpty()) {


            // save logo
            if ($request->hasFile('site_icon')) {
                $image = $request->file('site_icon');
                $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                $site_icon = $this->saveResizeImage($image, $destinationPath,250,250);
            } else {
                $site_icon = '';
            }

            // save icon
            if ($request->hasFile('site_logo')) {
                $image = $request->file('site_logo');
                $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                $site_logo = $this->saveResizeImage($image, $destinationPath,250,250);
            } else {
                $site_logo = '';
            }

            Setting::create([
                'site_name_ar' => $request->site_name_ar,
                'site_name_en' => $request->site_name_en,
                'site_email' => $request->site_email,
                'site_gmail' => $request->site_gmail,
                'site_facebook' => $request->site_facebook,
                'site_twitter' => $request->site_twitter,
                'site_youtube' => $request->site_youtube,
                'site_instagram' => $request->site_instagram,
                'site_phone' => $request->site_phone,
                'site_mobile' => $request->site_mobile,
                'site_lang_en' => $request->site_lang_en,
                'lang_front_button_status' => $request->lang_front_button_status,
                'site_description_ar' => $request->site_description_ar,
                'site_description_en' => $request->site_description_en,
                'site_keywords_ar' => $request->site_keywords_ar,
                'site_keywords_en' => $request->site_keywords_en,
                'site_icon' => $site_icon,
                'site_logo' => $site_logo,
            ]);
            return $this->returnSuccessMessage(__('general.add_success_message'));


            /////////////////////////////////////////////////////////////////////////////////////
            /// Update Settings
        } else {

            $settings = Setting::orderBy('id', 'desc')->first();
            //////////////////////////////////////////////////////
            /// check and upload icon and logo


            if ($request->hasFile('site_icon')) {
                $image_path = public_path("/adminBoard/uploadedImages/logos//") . $settings->site_icon;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                if (!empty($settings->site_icon)) {
                    $image = $request->file('site_icon');
                    $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                    $site_icon = $this->saveResizeImage($image, $destinationPath,250,250);
                } else {
                    $image = $request->file('site_icon');
                    $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                    $site_icon = $this->saveResizeImage($image, $destinationPath,250,250);
                }
            } else {
                if (!empty($settings->site_icon)) {
                    $site_icon = $settings->site_icon;
                } else {
                    $site_icon = '';
                }
            }



            if ($request->hasFile('site_logo')) {
                $image_path = public_path("/adminBoard/uploadedImages/logos//") . $settings->site_logo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                if (!empty($settings->site_logo)) {
                    $image = $request->file('site_logo');
                    $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                    $site_logo = $this->saveResizeImage($image, $destinationPath,250,250);
                } else {
                    $image = $request->file('site_logo');
                    $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                    $site_logo = $this->saveResizeImage($image, $destinationPath,250,250);
                }
            } else {
                if (!empty($settings->site_logo)) {
                    $site_logo = $settings->site_logo;
                } else {
                    $site_logo = '';
                }
            }


            $settings->update([
                'site_name_ar' => $request->site_name_ar,
                'site_name_en' => $request->site_name_en,
                'site_email' => $request->site_email,
                'site_gmail' => $request->site_gmail,
                'site_facebook' => $request->site_facebook,
                'site_twitter' => $request->site_twitter,
                'site_youtube' => $request->site_youtube,
                'site_instagram' => $request->site_instagram,
                'site_phone' => $request->site_phone,
                'site_mobile' => $request->site_mobile,
                'site_lang_en' => $request->site_lang_en,
                'lang_front_button_status' => $request->lang_front_button_status,
                'site_description_ar' => $request->site_description_ar,
                'site_description_en' => $request->site_description_en,
                'site_keywords_ar' => $request->site_keywords_ar,
                'site_keywords_en' => $request->site_keywords_en,
                'site_icon' => $site_icon,
                'site_logo' => $site_logo,
            ]);

            return $this->returnSuccessMessage(__('general.update_success_message'));
        }


    }


    ////////////////////////////////////////////////////////
    ///  switchEnglishLang
    public function switchEnglishLang(Request $request)
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        if ($request->switchStatus == 'false') {
            $settings->site_lang_en = null;
            $settings->save();
        } else {
            $settings->site_lang_en = 'on';
            $settings->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

    ////////////////////////////////////////////////////////
    ///  switchFrontend Language
    public function switchFrontendLang(Request $request)
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        if ($request->switchFrontendLanguageStatus == 'false') {
            $settings->lang_front_button_status = null;
            $settings->save();
        } else {
            $settings->lang_front_button_status = 'on';
            $settings->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

    ////////////////////////////////////////////////////////
    /// not Found
    public function notFound()
    {
        $title = __('general.not_found');
        return view('admin.errors.not-found', compact('title'));
    }


}
