<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Models\Testimonial;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class TestimonialsController extends Controller
{
    use GeneralTrait;


    // index
    public function index()
    {
        $title = __('menu.testimonials');
        $testimonials = Testimonial::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.testimonials.index', compact('title', 'testimonials'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_testimonial');
        return view('admin.testimonials.create', compact('title'));
    }

    // store
    public function store(TestimonialRequest $request)
    {
        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/testimonials');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }


        $site_lang_ar = setting()->site_lang_ar;

        Testimonial::create([
            'opinion_en' => $request->opinion_en,
            'opinion_ar' => $site_lang_ar == 'on' ? $request->opinion_ar : '',
            'name_en' => $request->name_en,
            'name_ar' => $site_lang_ar == 'on' ? $request->name_ar : null,
            'job_title_en' => $request->job_title_en,
            'job_title_ar' => $site_lang_ar == 'on' ? $request->job_title_ar : null,
            'age' => $request->age,
            'gender' => $request->gender,
            'country' => $request->country,
            'rating' => $request->rating,
            'status' => '',
            'photo' => $photo_path,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }


    // edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $testimonial = Testimonial::find($id);
        if (!$testimonial) {
            return redirect()->route('admin.not.found');
        }
        $title = __('testimonials.update_testimonial');
        return view('admin.testimonials.update', compact('title', 'testimonial'));
    }


    // store
    public function update(TestimonialRequest $request)
    {

        $testimonial = Testimonial::find($request->id);
        if (!$testimonial) {
            return redirect()->route('admin.not.found');
        }


        if ($request->hasFile('photo')) {

            if (!empty($testimonial->photo)) {
                $image_path = public_path('\adminBoard\uploadedImages\testimonials\\') . $testimonial->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\testimonials\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('\adminBoard\uploadedImages\testimonials\\');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            }
        } else {
            if (!empty($testimonial->photo)) {
                $photo_path = $testimonial->photo;
            } else {
                $photo_path = '';
            }
        }


        $site_lang_ar = setting()->site_lang_en;

        $testimonial->update([
            'opinion_en' => $request->opinion_en,
            'opinion_ar' => $site_lang_ar == 'on' ? $request->opinion_ar : '',
            'name_en' => $request->name_en,
            'name_ar' => $site_lang_ar == 'on' ? $request->name_ar : null,
            'job_title_en' => $request->job_title_en,
            'job_title_ar' => $site_lang_ar == 'on' ? $request->job_title_ar : null,
            'age' => $request->age,
            'gender' => $request->gender,
            'country' => $request->country,
            'rating' => $request->rating,
            'photo' => $photo_path,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }


    // trashed
    public function trashed()
    {
        $title = __('menu.trashed_testimonials');
        $testimonials = Testimonial::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.testimonials.trashed', compact('title', 'testimonials'));
    }


    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $testimonial = Testimonial::find($request->id);
            if (!$testimonial) {
                return redirect()->route('admin.not.found');
            }
            if ($testimonial->delete()) {
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 404);
            }
        }
    }

    //  restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $testimonial = Testimonial::onlyTrashed()->find($request->id);
            if (!$testimonial) {
                return redirect()->route('admin.not.found');
            }
            if ($testimonial->restore()) {
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            } else {
                return $this->returnError(__('general.restore_error_message'), 404);
            }
        }
    }

    //  force delete
    public function forceDelete(Request $request)
    {

        if ($request->ajax()) {

            $testimonial = Testimonial::onlyTrashed()->find($request->id);

            if (!$testimonial) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($testimonial->photo)) {
                $image_path = public_path('\adminBoard\uploadedImages\testimonials\\') . $testimonial->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }

            if ($testimonial->forceDelete()) {
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 404);
            }
        }
    }

    // change Status
    public function changeStatus(Request $request)
    {
        $testimonial = Testimonial::find($request->id);

        if ($request->switchStatus == 'false') {
            $testimonial->status = null;
            $testimonial->save();
        } else {
            $testimonial->status = 'on';
            $testimonial->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
