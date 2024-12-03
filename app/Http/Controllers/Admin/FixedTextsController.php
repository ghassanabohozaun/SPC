<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FixedTextsRequest;
use App\Models\FixedText;
use App\Traits\GeneralTrait;
use File;

class FixedTextsController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = trans('menu.fixed_texts');
        return view('admin.landing-page.fixed-texts', compact('title'));
    }

    // update
    public function update(FixedTextsRequest $request)
    {

        $fixedText = FixedText::get();

        if ($fixedText->isEmpty()) {
            FixedText::create([
                'project_details_ar' => $request->project_details_ar,
                'project_details_en' => $request->project_details_en,
                'about_association_title_ar' => $request->about_association_title_ar,
                'about_association_title_en' => $request->about_association_title_en,
                'about_association_details_ar' => $request->about_association_details_ar,
                'about_association_details_en' => $request->about_association_details_en,
                'about_association_founders_count' => $request->about_association_founders_count,
                'about_association_beneficiaries_count' => $request->about_association_beneficiaries_count,
                'founders_title_ar' => $request->founders_title_ar,
                'founders_title_en' => $request->founders_title_en,
                'blog_title_ar' => $request->blog_title_ar,
                'blog_title_en' => $request->blog_title_en,
                'testimonials_title_ar' => $request->testimonials_title_ar,
                'testimonials_title_en' => $request->testimonials_title_en,
                'testimonials_details_ar' => $request->testimonials_details_ar,
                'testimonials_details_en' => $request->testimonials_details_en,
                'counter_icon_1' => $request->counter_icon_1,
                'counter_number_1' => $request->counter_number_1,
                'counter_name_1_ar' => $request->counter_name_1_ar,
                'counter_name_1_en' => $request->counter_name_1_en,
                'counter_icon_2' => $request->counter_icon_2,
                'counter_number_2' => $request->counter_number_2,
                'counter_name_2_ar' => $request->counter_name_2_ar,
                'counter_name_2_en' => $request->counter_name_2_en,
                'counter_icon_3' => $request->counter_icon_3,
                'counter_number_3' => $request->counter_number_3,
                'counter_name_3_ar' => $request->counter_name_3_ar,
                'counter_name_3_en' => $request->counter_name_3_en,
                'counter_icon_4' => $request->counter_icon_4,
                'counter_number_4' => $request->counter_number_4,
                'counter_name_4_ar' => $request->counter_name_4_ar,
                'counter_name_4_en' => $request->counter_name_4_en,

            ]);
            return $this->returnSuccessMessage(trans('general.add_success_message'));
        } else {

            $fixedTextUpdate = FixedText::orderBy('id', 'desc')->first();


            // save image
            if ($request->hasFile('counter_icon_1')) {
                $image = $request->file('counter_icon_1');
                $destinationPath = public_path('adminBoard/uploadedImages/counters//');
                $counter_icon_1_path = $this->saveResizeImage($image, $destinationPath, 100, 100);
                $counter_icon_1_image_path = public_path("/adminBoard/uploadedImages/counters//") . $fixedTextUpdate->counter_icon_1;
                if (File::exists($counter_icon_1_image_path)) {
                    File::delete($counter_icon_1_image_path);
                }
            } else {
                $counter_icon_1_path = $fixedTextUpdate->counter_icon_1;
            }

            // save image
            if ($request->hasFile('counter_icon_2')) {
                $image = $request->file('counter_icon_2');
                $destinationPath = public_path('adminBoard/uploadedImages/counters//');
                $counter_icon_2_path = $this->saveResizeImage($image, $destinationPath, 100, 100);
                $counter_icon_2_image_path = public_path("/adminBoard/uploadedImages/counters//") . $fixedTextUpdate->counter_icon_2;
                if (File::exists($counter_icon_2_image_path)) {
                    File::delete($counter_icon_2_image_path);
                }
            } else {
                $counter_icon_2_path = $fixedTextUpdate->counter_icon_2;
            }

            // save image
            if ($request->hasFile('counter_icon_3')) {
                $image = $request->file('counter_icon_3');
                $destinationPath = public_path('adminBoard/uploadedImages/counters//');
                $counter_icon_3_path = $this->saveResizeImage($image, $destinationPath, 100, 100);
                $counter_icon_3_image_path = public_path("/adminBoard/uploadedImages/counters//") . $fixedTextUpdate->counter_icon_3;
                if (File::exists($counter_icon_3_image_path)) {
                    File::delete($counter_icon_3_image_path);
                }
            } else {
                $counter_icon_3_path = $fixedTextUpdate->counter_icon_3;
            }

            // save image
            if ($request->hasFile('counter_icon_4')) {
                $image = $request->file('counter_icon_4');
                $destinationPath = public_path('adminBoard/uploadedImages/counters//');
                $counter_icon_4_path = $this->saveResizeImage($image, $destinationPath, 100, 100);
                $counter_icon_4_image_path = public_path("/adminBoard/uploadedImages/counters//") . $fixedTextUpdate->counter_icon_4;
                if (File::exists($counter_icon_4_image_path)) {
                    File::delete($counter_icon_4_image_path);
                }
            } else {
                $counter_icon_4_path = $fixedTextUpdate->counter_icon_4;
            }


            $fixedTextUpdate->update([
                'project_details_ar' => $request->project_details_ar,
                'project_details_en' => $request->project_details_en,
                'about_association_title_ar' => $request->about_association_title_ar,
                'about_association_title_en' => $request->about_association_title_en,
                'about_association_details_ar' => $request->about_association_details_ar,
                'about_association_details_en' => $request->about_association_details_en,
                'about_association_founders_count' => $request->about_association_founders_count,
                'about_association_beneficiaries_count' => $request->about_association_beneficiaries_count,
                'founders_title_ar' => $request->founders_title_ar,
                'founders_title_en' => $request->founders_title_en,
                'blog_title_ar' => $request->blog_title_ar,
                'blog_title_en' => $request->blog_title_en,
                'testimonials_title_ar' => $request->testimonials_title_ar,
                'testimonials_title_en' => $request->testimonials_title_en,
                'testimonials_details_ar' => $request->testimonials_details_ar,
                'testimonials_details_en' => $request->testimonials_details_en,
                'counter_icon_1' => $counter_icon_1_path,
                'counter_number_1' => $request->counter_number_1,
                'counter_name_1_ar' => $request->counter_name_1_ar,
                'counter_name_1_en' => $request->counter_name_1_en,
                'counter_icon_2' => $counter_icon_2_path,
                'counter_number_2' => $request->counter_number_2,
                'counter_name_2_ar' => $request->counter_name_2_ar,
                'counter_name_2_en' => $request->counter_name_2_en,
                'counter_icon_3' => $counter_icon_3_path,
                'counter_number_3' => $request->counter_number_3,
                'counter_name_3_ar' => $request->counter_name_3_ar,
                'counter_name_3_en' => $request->counter_name_3_en,
                'counter_icon_4' => $counter_icon_4_path,
                'counter_number_4' => $request->counter_number_4,
                'counter_name_4_ar' => $request->counter_name_4_ar,
                'counter_name_4_en' => $request->counter_name_4_en,
            ]);

            return $this->returnSuccessMessage(__('general.update_success_message'));
        }
    }
}
