<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FAQRequest;
use App\Models\FAQ;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $title = __('menu.faqs');
        $faqs = FAQ::orderByDesc('created_at')->paginate(15);
        return view('admin.faq.index', compact('faqs', 'title'));
    }

    public function create()
    {
        $title = __('menu.add_new_faq');
        return view('admin.faq.create', compact('title'));
    }

    public function store(FAQRequest $request)
    {
        $lang_ar  = setting()->site_lang_ar;

        FAQ::create([
            'question_en' => $request->question_en,
            'question_ar' => $lang_ar == 'on' ? $request->question_ar : '',
            'answer_en' => $request->answer_en,
            'answer_ar' => $lang_ar == 'on' ? $request->answer_ar : '',
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.faq.update', compact('faq'));
    }

    public function update(FAQRequest $request)
    {
        // return $request->all();
        $faq = FAQ::findORFail($request->id);

        $lang_ar = setting()->site_lang_ar;
        $faq->update([
            'question_en' => $request->question_en,
            'question_ar' => $lang_ar == 'on' ? $request->question_ar : '',
            'answer_en' => $request->answer_en,
            'answer_ar' => $lang_ar == 'on' ? $request->answer_ar : '',
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    public function trashed()
    {
        $title = __('menu.trashed_faq');
        $faqs = FAQ::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);
        return view('admin.faq.trashed', compact('title', 'faqs'));
    }


    ///////////////////////////////////////////////
    /// destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $faq = FAQ::find($request->id);
                if (!$faq) {
                    return redirect()->route('admin.not.found');
                }
                $faq->delete();
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
                $faq = FAQ::onlyTrashed()->find($request->id);
                if (!$faq) {
                    return redirect()->route('admin.not.found');
                }
                $faq->restore();
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

                $faq = FAQ::onlyTrashed()->find($request->id);

                if (!$faq) {
                    return redirect()->route('admin.not.found');
                }


                $faq->forceDelete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch

    }


    public function changeStatus(Request $request)
    {

        $faq = FAQ::find($request->id);

        if ($request->switchStatus == 'false') {
            $faq->status = null;
            $faq->save();
        } else {
            $faq->status = 'on';
            $faq->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
