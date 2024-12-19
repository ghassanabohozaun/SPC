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

        $whom_brochure_file  = $this->storeWhoBrochure($request,$aboutSite);

        if ($aboutSite) {
            $aboutSite->update([
                'whom_en' => $request->whom_en,
                'whom_ar' => $request->whom_ar,
                'contact_us_en' => $request->contact_us_en,
                'contact_us_ar' => $request->contact_us_ar,
                'whom_brochure' => $whom_brochure_file,
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

    public function storeWhoBrochure($request,$aboutSite)
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
                $whom_brochure_file = $this->saveFile($file_name, $file_destination);
            } else {
                $file_name = $request->file('whom_brochure');
                $file_destination = public_path('/adminBoard/uploadedFiles/brochures//');
                $whom_brochure_file = $this->saveFile($file_name, $file_destination);
            }
        } else {
            if (!empty($aboutSite->whom_brochure)) {
                $whom_brochure_file = $aboutSite->whom_brochure;
            } else {
                $whom_brochure_file = '';
            }
        }

        return  $whom_brochure_file;
    }
}
