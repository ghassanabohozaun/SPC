<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutSpcRequest;
use App\Http\Requests\ServiceRequest;
use App\Models\AboutSpc;
use App\Models\Service;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class AboutSpcController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.about_spc');
        $aboutSpcs = AboutSpc::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.about.aboutSpcs.index', compact('title', 'aboutSpcs'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_about_spc');
        return view('admin.about.aboutSpcs.create', compact('title'));
    }

    // store
    public function store(AboutSpcRequest $request)
    {

        $site_lang_ar = setting()->site_lang_ar;
        $aboutSpc =  AboutSpc::create(
            [
                'title_en' => $request->title_en,
                'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : '',
                'details_en' => $request->details_en,
                'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : '',
                'status' => 'on',
                'language' =>   $site_lang_ar == 'on' ? 'ar_en'  : 'en',
            ]
        );

        if ($aboutSpc) {
            return $this->returnSuccessMessage(__('general.add_success_message'));
        } else {
            return $this->returnError('general.add_error_message', 404);
        }
    }

    // edit
    public function edit($id)
    {
        $title = __('aboutSpcs.about_spc_update');
        $aboutSpc = AboutSpc::find($id);
        if (!$aboutSpc) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.about.aboutSpcs.update', compact('title', 'aboutSpc'));
    }

    // update
    public function update(AboutSpcRequest $request)
    {
        $aboutSpc = AboutSpc::find($request->id);
        if (!$aboutSpc) {
            return redirect()->route('admin.not.found');
        }

        $site_lang_ar = setting()->site_lang_ar;
        $aboutSpc->update(
            [
                'title_en' => $request->title_en,
                'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : '',
                'details_en' => $request->details_en,
                'details_ar' => $site_lang_ar == 'on' ? $request->details_ar : '',
                'status' => 'on',
                'language' =>   $site_lang_ar == 'on' ? 'ar_en'  : 'en',
            ]
        );

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $aboutSpc = AboutSpc::find($request->id);
            if (!$aboutSpc) {
                return redirect()->route('admin.not.found');
            }

            if ($aboutSpc->forceDelete()) {
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }


    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $aboutSpc  = AboutSpc::find($request->id);
            if (!$aboutSpc) {
                return redirect()->route('admin.not.found');
            }
            if ($request->statusSwitch == 'true') {
                $aboutSpc->status = 'on';
                $aboutSpc->save();
            } else {
                $aboutSpc->status = '';
                $aboutSpc->save();
            }

            return $this->returnSuccessMessage(__('general.change_status_success_message'));
        }
    }
}
