<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class ServicesController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.services');
        $services = Service::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.services.index', compact('title', 'services'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_service');
        return view('admin.services.create', compact('title'));
    }

    // store
    public function store(ServiceRequest $request)
    {

        if ($request->hasFile('photo')) {
            $photo_file  = $request->file('photo');
            $path_destination = public_path('/adminBoard/uploadedImages/services//');
            $photo = $this->saveResizeImage($photo_file, $path_destination, 800, 600);
        } else {
            $photo = '';
        }

        $site_lang_ar = setting()->site_lang_ar;

        $service =  Service::create(
            [
                'title_en_slug' => slug($request->title_en),
                'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : '',
                'title_en' => $request->title_en,
                'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : '',
                'summary_en' => $request->summary_en,
                'summary_ar' => $site_lang_ar == 'on' ? $request->summary_ar : '',
                'details_en' => $request->details_en,
                'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : '',
                'is_treatment_area' => $request->is_treatment_area,
                'status' => 'on',
                'photo' => $photo,
                'language' =>   $site_lang_ar == 'on' ? 'ar_en'  : 'en',
            ]
        );

        if ($service) {
            return $this->returnSuccessMessage(__('general.add_success_message'));
        } else {
            return $this->returnError('general.add_error_message', 404);
        }
    }

    // edit
    public function edit($id)
    {
        $title = __('services.service_update');
        $service = Service::find($id);
        if (!$service) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.services.update', compact('title', 'service'));
    }

    // update
    public function update(ServiceRequest $request)
    {
        $service = Service::find($request->id);
        if (!$service) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            if (!empty($service->photo)) {

                //delete old photo
                $public_path = public_path('/adminBoard/uploadedImages/services//') . $service->photo;
                if (File::exists($public_path)) {
                    File::delete($public_path);
                }

                // upload new photo
                $photo_file = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/services//');
                $photo = $this->saveResizeImage($photo_file, $photo_destination, 800, 600);
            } else {

                $photo_file = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/services//');
                $photo = $this->saveResizeImage($photo_file, $photo_destination, 800, 600);
            }
        } else {
            if (!empty($service->photo)) {
                $photo = $service->photo;
            } else {
                $photo = '';
            }
        }


        $site_lang_ar = setting()->site_lang_ar;

        $service->update(
            [
                'title_en' => $request->title_en,
                'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : '',
                'title_en_slug' => slug($request->title_en),
                'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : '',
                'summary_en' => $request->summary_en,
                'summary_ar' => $site_lang_ar == 'on' ? $request->summary_ar : '',
                'details_en' => $request->details_en,
                'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : '',
                'is_treatment_area' => $request->is_treatment_area,
                'status' => 'on',
                'photo' => $photo,
                'language' =>   $site_lang_ar == 'on' ? 'ar_en'  : 'en',
            ]
        );


        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $service = Service::find($request->id);
            if (!$service) {
                return redirect()->route('admin.not.found');
            }

            if ($service->delete()) {
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }

    // get trashed
    public function getTrashed()
    {
        $title =  __('general.trashed');
        $services   = Service::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);
        return view('admin.services.trashed', compact('title', 'services'));
    }


    // restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $service = Service::onlyTrashed()->find($request->id);
            if (!$service) {
                return redirect()->route('admin.not.found');
            }
            if ($service->restore()) {
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            } else {
                return $this->returnError('general.restore_error_message', 404);
            }
        }
    }


    // force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $service = Service::onlyTrashed()->find($request->id);

            if (!$service) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($service->photo)) {
                $public_path = public_path('/adminBoard/uploadedImages/services//') . $service->photo;
                if (File::exists($public_path)) {
                    File::delete($public_path);
                }
            }

            if ($service->forceDelete()) {
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 404);
            }
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $service  = Service::find($request->id);
            if (!$service) {
                return redirect()->route('admin.not.found');
            }
            if ($request->statusSwitch == 'true') {
                $service->status = 'on';
                $service->save();
            } else {
                $service->status = '';
                $service->save();
            }

            return $this->returnSuccessMessage(__('general.change_status_success_message'));
        }
    }
}
