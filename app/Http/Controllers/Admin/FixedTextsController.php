<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSiteRequest;
use App\Models\FixedText;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class FixedTextsController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.fixed_texts');
        return view('admin.landing-page.fixed-texts', compact('title'));
    }

    // store
    public function update(AboutSiteRequest $request)
    {
        $fixedText = FixedText::first();

        $aboutSpcPhotoName = $this->storeAboutSpcPhoto($request, $fixedText);

        if ($fixedText) {
            $fixedText->update([
                // about spc
                'about_spc_title_en' => $request->about_spc_title_en,
                'about_spc_title_ar' => $request->about_spc_title_ar,
                'about_spc_details_en' => $request->about_spc_details_en,
                'about_spc_details_ar' => $request->about_spc_details_ar,
                'about_spc_goal_one_en' => $request->about_spc_goal_one_en,
                'about_spc_goal_two_en' => $request->about_spc_goal_two_en,
                'about_spc_goal_three_en' => $request->about_spc_goal_three_en,
                'about_spc_goal_four_en' => $request->about_spc_goal_four_en,
                'about_spc_goal_one_ar' => $request->about_spc_goal_one_ar,
                'about_spc_goal_two_ar' => $request->about_spc_goal_two_ar,
                'about_spc_goal_three_ar' => $request->about_spc_goal_three_ar,
                'about_spc_goal_four_ar' => $request->about_spc_goal_four_ar,
                'about_spc_photo' => $aboutSpcPhotoName,
            ]);

            if ($fixedText) {
                return $this->returnSuccessMessage(__('general.update_success_message'));
            } else {
                return $this->returnError(__('general.add_error_message'), 404);
            }
        } else {
            return $this->returnError(__('general.internal_server_error_message'), 500);
        }
    }

    public function storeAboutSpcPhoto($request, $fixedText)
    {
        if ($request->hasFile('about_spc_photo')) {
            if (!empty($fixedText->about_spc_photo)) {
                //delete old photo
                $public_path = public_path('/adminBoard/uploadedImages/fixedTexts//') . $fixedText->about_spc_photo;
                if (File::exists($public_path)) {
                    File::delete($public_path);
                }

                // upload new photo
                $photo_file = $request->file('about_spc_photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/fixedTexts//');
                $photo = $this->saveResizeImage($photo_file, $photo_destination, 1200, 800);
            } else {
                $photo_file = $request->file('about_spc_photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/fixedTexts//');
                $photo = $this->saveResizeImage($photo_file, $photo_destination, 1200, 800);
            }
        } else {
            if (!empty($fixedText->about_spc_photo)) {
                $photo = $fixedText->about_spc_photo;
            } else {
                $photo = '';
            }
        }

        return $photo;
    }
}
