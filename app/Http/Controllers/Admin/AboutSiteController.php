<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSiteRequest;
use App\Models\AboutSite;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class AboutSiteController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.about_site');
        return view('admin.about.aboutSite.index', compact('title'));
    }

    // store
    public function update(AboutSiteRequest $request)
    {
        $aboutSite = AboutSite::first();

        $whom_brochure_file = $this->storeWhoBrochure($request, $aboutSite);

        $who_are_we_profile = $this->storeWhoAreYouBrochure($request, $aboutSite);

        $why_chose_us_photo = $this->storeWhyChoseUsPhoto($request, $aboutSite);


        if ($aboutSite) {
            $aboutSite->update([
                // whom
                'whom_en' => $request->whom_en,
                'whom_ar' => $request->whom_ar,
                'contact_us_en' => $request->contact_us_en,
                'contact_us_ar' => $request->contact_us_ar,
                'whom_brochure' => $whom_brochure_file,
                // who are you
                'who_are_we_en'=>$request->who_are_we_en,
                'who_are_we_ar'=>$request->who_are_we_en,
                'who_are_we_profile'=>$who_are_we_profile,
                // about doctor
                'about_doctor_en'=>$request->about_doctor_en,
                'about_doctor_ar'=>$request->about_doctor_ar,
                // why chose us
                'why_chose_us_title_en'=>$request->why_chose_us_title_en,
                'why_chose_us_title_ar'=>$request->why_chose_us_title_ar,
                'why_chose_us_details_en'=>$request->why_chose_us_details_en,
                'why_chose_us_details_ar'=>$request->why_chose_us_details_ar,
                'why_chose_us_photo'=>$why_chose_us_photo,


            ]);

            if ($aboutSite) {
                return $this->returnSuccessMessage(__('general.update_success_message'));
            } else {
                return $this->returnError(__('general.add_error_message'), 404);
            }
        } else {
            return $this->returnError(__('general.internal_server_error_message'), 500);
        }
    }

    public function storeWhoBrochure($request, $aboutSite)
    {
        // whom brochure  upload
        if ($request->hasFile('whom_brochure')) {
            if (!empty($aboutSite->whom_brochure)) {
                //delete old file
                $file_public_path = public_path('/adminBoard/uploadedFiles/brochures//') . $aboutSite->whom_brochure;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }

                // upload new file
                $file_name = $request->file('whom_brochure');
                $file_destination = public_path('/adminBoard/uploadedFiles/brochures//');
                $file = $this->saveFile($file_name, $file_destination);
            } else {
                $file_name = $request->file('whom_brochure');
                $file_destination = public_path('/adminBoard/uploadedFiles/brochures//');
                $file = $this->saveFile($file_name, $file_destination);
            }
        } else {
            if (!empty($aboutSite->whom_brochure)) {
                $file = $aboutSite->whom_brochure;
            } else {
                $file = '';
            }
        }

        return $file;
    }


    public function storeWhoAreYouBrochure($request, $aboutSite)
    {
        // whom brochure  upload
        if ($request->hasFile('who_are_we_profile')) {
            if (!empty($aboutSite->who_are_we_profile)) {
                //delete old file
                $file_public_path = public_path('/adminBoard/uploadedFiles/brochures//') . $aboutSite->who_are_we_profile;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }

                // upload new file
                $file_name = $request->file('who_are_we_profile');
                $file_destination = public_path('/adminBoard/uploadedFiles/brochures//');
                $file = $this->saveFile($file_name, $file_destination);
            } else {
                $file_name = $request->file('who_are_we_profile');
                $file_destination = public_path('/adminBoard/uploadedFiles/brochures//');
                $file = $this->saveFile($file_name, $file_destination);
            }
        } else {
            if (!empty($aboutSite->who_are_we_profile)) {
                $file = $aboutSite->who_are_we_profile;
            } else {
                $file = '';
            }
        }

        return $file;
    }


    public function storeWhyChoseUsPhoto($request, $aboutSite){

        if ($request->hasFile('why_chose_us_photo')) {
            if (!empty($aboutSite->why_chose_us_photo)) {

                //delete old photo
                $public_path = public_path('/adminBoard/uploadedImages/about_sites//') . $aboutSite->why_chose_us_photo;
                if (File::exists($public_path)) {
                    File::delete($public_path);
                }

                // upload new photo
                $photo_file = $request->file('why_chose_us_photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/about_sites//');
                $photo = $this->saveResizeImage($photo_file, $photo_destination, 400, 400);
            } else {

                $photo_file = $request->file('why_chose_us_photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/about_sites//');
                $photo  = $this->saveResizeImage($photo_file, $photo_destination, 400, 400);
            }
        } else {
            if (!empty($aboutSite->why_chose_us_photo)) {
                $photo = $aboutSite->why_chose_us_photo;
            } else {
                $photo = '';
            }
        }

        return $photo;

    }
}
