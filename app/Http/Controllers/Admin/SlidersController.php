<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlidersRequest;
use App\Models\Slider;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.sliders');
        $sliders = Slider::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.landing-page.sliders.index', compact('title', 'sliders'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_slider');
        return view('admin.landing-page.sliders.create', compact('title'));
    }

    // store
    public function store(SlidersRequest $request)
    {
        $sliderOrderExist = Slider::where('order', $request->order)->get();
        if ($sliderOrderExist->isEmpty()) {
            return $this->storeSlider($request);
        } else {
            $maxSliderOrder = Slider::max('order');
            Slider::where('order', $request->order)->update(['order' => $maxSliderOrder + 1]);
            return $this->storeSlider($request);
        }
    }

    // store
    protected function storeSlider(SlidersRequest $request)
    {
        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('/adminBoard/uploadedImages/sliders//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 1920, 908);
        } else {
            $photo_path = '';
        }

        $lang_en = setting()->site_lang_en;

        Slider::create([
            'photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'details_status' => $request->details_status,
            'url_ar' => null,
            'url_en' => null,
            'order' => $request->order,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    // edit
    public function edit($id = null)
    {
        $slider = Slider::find($id);
        if (!$slider) {
            return redirect()->route('admin.not.found');
        }
        $title = __('sliders.slider_update');
        return view('admin.landing-page.sliders.update', compact('title', 'slider'));
    }


    // update
    public function update(SlidersRequest $request)
    {
        $sliderOrderExist = Slider::where('order', $request->order)->get();
        if ($sliderOrderExist->isEmpty()) {
            return $this->updateSlider($request);
        } else {
            $maxSliderOrder = Slider::max('order');
            Slider::where('order', $request->order)->update(['order' => $maxSliderOrder + 1]);
            return $this->updateSlider($request);
        }
    }

    // update
    protected function updateSlider(SlidersRequest $request)
    {

        $slider = Slider::find($request->id);

        if (!$slider) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            $image_path = public_path("/adminBoard/uploadedImages/sliders//") . $slider->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            if (!empty($slider->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/sliders//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 1920, 908);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/sliders//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 1920, 908);
            }
        } else {
            if (!empty($slider->photo)) {
                $photo_path = $slider->photo;
            } else {
                $photo_path = '';
            }
        }

        $lang_en = setting()->site_lang_en;
        $slider->update([
            'photo' => $photo_path,
            'language' => $lang_en == 'on' ? 'ar_en' : 'ar',
            'title_ar' => $request->title_ar,
            'title_en' => $lang_en == 'on' ? $request->title_en : null,
            'details_ar' => $request->details_ar,
            'details_en' => $lang_en == 'on' ? $request->details_en : null,
            'details_status' => $request->details_status,
            'url_ar' => null,
            'url_en' => null,
            'order' => $request->order,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // trashed
    public function trashed()
    {
        $title = __('menu.trashed_sliders');
        $sliders = Slider::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.landing-page.sliders.trashed', compact('title', 'sliders'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $slider = Slider::find($request->id);
            if (!$slider) {
                return redirect()->route('admin.not.found');
            }
            $slider->delete();
            return $this->returnSuccessMessage(__('general.move_to_trash'));
        }
    }

    //  restore
    public function restore(Request $request)
    {

        if ($request->ajax()) {
            $slider = Slider::onlyTrashed()->find($request->id);
            if (!$slider) {
                return redirect()->route('admin.not.found');
            }
            $slider->restore();
            return $this->returnSuccessMessage(__('general.restore_success_message'));
        }

    }

    //  force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $slider = Slider::onlyTrashed()->find($request->id);
            if (!$slider) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($slider->photo)) {
                $image_path = public_path("/adminBoard/uploadedImages/sliders//") . $slider->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $slider->forceDelete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }

    // change Status
    public function changeStatus(Request $request)
    {
        $slider = Slider::find($request->id);
        if ($request->switchStatus == 'false') {
            $slider->status = null;
            $slider->save();
        } else {
            $slider->status = 'on';
            $slider->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

}
