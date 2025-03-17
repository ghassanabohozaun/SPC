<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class SettingsController extends Controller
{

    use GeneralTrait;
    ////////////////////////////////////////////////////////
    /// get Settings
    public function index()
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
                $site_icon = $this->saveResizeImage($image, $destinationPath, 250, 250);
            } else {
                $site_icon = '';
            }

            // save icon
            if ($request->hasFile('site_logo')) {
                $image = $request->file('site_logo');
                $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                $site_logo = $this->saveResizeImage($image, $destinationPath, 250, 250);
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
                'site_linkedin' => $request->site_linkedin,
                'site_phone' => $request->site_phone,
                'site_mobile' => $request->site_mobile,
                'site_lang_ar' => $request->site_lang_ar,
                'lang_front_button_status' => $request->lang_front_button_status,
                'disabled_forms_button' => $request->disabled_forms_button,
                'site_description_ar' => $request->site_description_ar,
                'site_description_en' => $request->site_description_en,
                'site_keywords_ar' => $request->site_keywords_ar,
                'site_keywords_en' => $request->site_keywords_en,
                'site_address_ar' => $request->site_address_ar,
                'site_address_en' => $request->site_address_en,
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
                    $site_icon = $this->saveResizeImage($image, $destinationPath, 250, 250);
                } else {
                    $image = $request->file('site_icon');
                    $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                    $site_icon = $this->saveResizeImage($image, $destinationPath, 250, 250);
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
                    $site_logo = $this->saveResizeImage($image, $destinationPath, 250, 250);
                } else {
                    $image = $request->file('site_logo');
                    $destinationPath = public_path('/adminBoard/uploadedImages/logos//');
                    $site_logo = $this->saveResizeImage($image, $destinationPath, 250, 250);
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
                'site_linkedin' => $request->site_linkedin,
                'site_phone' => $request->site_phone,
                'site_mobile' => $request->site_mobile,
                'site_lang_ar' => $request->site_lang_ar,
                'lang_front_button_status' => $request->lang_front_button_status,
                'disabled_forms_button' => $request->disabled_forms_button,
                'site_description_ar' => $request->site_description_ar,
                'site_description_en' => $request->site_description_en,
                'site_keywords_ar' => $request->site_keywords_ar,
                'site_keywords_en' => $request->site_keywords_en,
                'site_address_ar' => $request->site_address_ar,
                'site_address_en' => $request->site_address_en,
                'site_icon' => $site_icon,
                'site_logo' => $site_logo,
            ]);

            return $this->returnSuccessMessage(__('general.update_success_message'));
        }
    }

    ////////////////////////////////////////////////////////
    ///  switchArbicLang
    public function switchArabicLang(Request $request)
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        if ($request->switchStatus == 'false') {
            $settings->site_lang_ar = null;
            $settings->save();
        } else {
            $settings->site_lang_ar = 'on';
            $settings->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

    ////////////////////////////////////////////////////////
    ///  switch Frontend Language
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
    ///  switch disabled forms
    public function switchDisabledForms(Request $request)
    {
        $settings = Setting::orderBy('id', 'desc')->first();
        if ($request->switchDisabledFromsButton == 'false') {
            $settings->disabled_forms_button = null;
            $settings->save();
        } else {
            $settings->disabled_forms_button = 'on';
            $settings->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
