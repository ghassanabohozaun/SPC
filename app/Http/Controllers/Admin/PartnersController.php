<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PartnersRequest;
use App\Models\Partner;
use App\Models\Slider;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.partners');
        $partners = Partner::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.landing-page.partners.index', compact('title', 'partners'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_partner');
        return view('admin.landing-page.partners.create', compact('title'));
    }


    // store
    protected function store(PartnersRequest $request)
    {
        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('/adminBoard/uploadedImages/partners//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 215, 125);
        } else {
            $photo_path = '';
        }

        Partner::create([
            'photo' => $photo_path,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    // edit
    public function edit($id = null)
    {
        $partner = Partner::find($id);
        if (!$partner) {
            return redirect()->route('admin.not.found');
        }
        $title = __('partners.partner_update');
        return view('admin.landing-page.partners.update', compact('title', 'partner'));
    }




    // update
    protected function update(PartnersRequest $request)
    {

        $partner = Partner::find($request->id);

        if (!$partner) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            $image_path = public_path("/adminBoard/uploadedImages/partners//") . $partner->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }
            if (!empty($partner->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/partners//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 215, 125);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/partners//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 215, 125);
            }
        } else {
            if (!empty($partner->photo)) {
                $photo_path = $partner->photo;
            } else {
                $photo_path = '';
            }
        }

        $partner->update([
            'photo' => $photo_path,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // trashed
    public function trashed()
    {
        $title = __('menu.trashed_partners');
        $partners = Partner::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.landing-page.partners.trashed', compact('title', 'partners'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $partner = Partner::find($request->id);
            if (!$partner) {
                return redirect()->route('admin.not.found');
            }
            $partner->delete();
            return $this->returnSuccessMessage(__('general.move_to_trash'));
        }
    }

    //  restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $partner = Partner::onlyTrashed()->find($request->id);
            if (!$partner) {
                return redirect()->route('admin.not.found');
            }
            $partner->restore();
            return $this->returnSuccessMessage(__('general.restore_success_message'));
        }
    }

    //  force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $partner = Partner::onlyTrashed()->find($request->id);
            if (!$partner) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($partner->photo)) {
                $image_path = public_path("/adminBoard/uploadedImages/partners//") . $partner->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $partner->forceDelete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }

    // change Status
    public function changeStatus(Request $request)
    {
        $partner = Partner::find($request->id);
        if ($request->switchStatus == 'false') {
            $partner->status = null;
            $partner->save();
        } else {
            $partner->status = 'on';
            $partner->save();
        }
        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }

}
