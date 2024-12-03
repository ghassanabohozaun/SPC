<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QARequest;
use App\Models\QA;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class QAController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $QAs = QA::paginate(15);
        $title = __('menu.faq');
        return view('admin.QA.index', compact('QAs', 'title'));
    }

    public function create()
    {
        $title = __('menu.add_new_faq');
        return view('admin.QA.create', compact('title'));
    }

    public function store(QARequest $request)
    {
        $lang_ar = setting()->site_lang_ar;

        QA::create([
            'details_ar' => $lang_ar == 'on' ? $request->details_ar : '',
            'details_en' => $request->details_en,
            'title_ar' => $lang_ar == 'on' ? $request->title_ar : '',
            'title_en' => $request->title_en,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    public function edit($id)
    {
        $QA = QA::findOrFail($id);
        return view('admin.QA.update', compact('QA'));
    }

    public function update(QARequest $request)
    {
        // return $request->all();
        $QA = QA::findORFail($request->id);

        $lang_ar = setting()->site_lang_ar;
        $QA->update([
            'details_ar' => $lang_ar == 'on' ? $request->details_ar : '',
            'details_en' => $request->details_en,
            'title_ar' => $lang_ar == 'on' ? $request->title_ar : '',
            'title_en' => $request->title_en,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    public function trashed()
    {
        $title = __('menu.trashed_qas');
        $QAs = QA::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.QA.trashed', compact('title', 'QAs'));
    }


    ///////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $QA = QA::find($request->id);
                if (!$QA) {
                    return redirect()->route('admin.not.found');
                }
                $QA->delete();
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch
    }

    /////////////////////////////////////////
    ///  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $QA = QA::onlyTrashed()->find($request->id);
                if (!$QA) {
                    return redirect()->route('admin.not.found');
                }
                $QA->restore();
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch
    }

    /////////////////////////////////////////
    ///  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {

                $QA = QA::onlyTrashed()->find($request->id);

                if (!$QA) {
                    return redirect()->route('admin.not.found');
                }


                $QA->forceDelete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch

    }


    public function changeStatus(Request $request)
    {

        $QA = QA::find($request->id);

        if ($request->switchStatus == 'false') {
            $QA->status = null;
            $QA->save();
        } else {
            $QA->status = 'on';
            $QA->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
