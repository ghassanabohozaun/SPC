<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SupportCenterRequest;
use App\Models\SupportCenter;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class SupportCenterController extends Controller
{
    use GeneralTrait;

    //////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = __('menu.support_center');
        $supportCenters = SupportCenter::orderByDesc('created_at')->paginate(10);
        return view('admin.support-center.index', compact('title','supportCenters'));
    }
    //////////////////////////////////////////////////
    /// create
    public function create()
    {
        $title = __('supportCenter.send_message');
        return view('admin.support-center.create', compact('title'));
    }
    //////////////////////////////////////////////////
    /// send
    public function send(SupportCenterRequest $request)
    {
        try {
            SupportCenter::create([
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'title' => $request->title,
                'message' => $request->message,
            ]);
            return $this->returnSuccessMessage(__('general.send_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }

    //////////////////////////////////////////////////
    /// change Status
    public function changeStatus(Request $request)
    {

        try {
            $supportCenterMessage = SupportCenter::find($request->id);
            if (!$supportCenterMessage) {
                return redirect()->route('admin.not.found');
            }
            if ($request->status == 'contacted') {
                $supportCenterMessage->status = 'contacted';
                $supportCenterMessage->save();
            }
            if ($request->status == 'solved') {
                $supportCenterMessage->status = 'solved';
                $supportCenterMessage->save();
            }
            return $this->returnSuccessMessage(__('general.change_status_success_message'));
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }

    //////////////////////////////////////////////////
    /// get One Message
    public function getOneMessage(Request $request)
    {
        if ($request->ajax()) {
            $supportCenterMessage = SupportCenter::find($request->id);
            return $this->returnData('OK', 'data', $supportCenterMessage);
        }

    }


    /////////////////////////////////////////
    /// support center message delete
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $supportCenterMesssage = SupportCenter::find($request->id);
                if (!$supportCenterMesssage) {
                    return redirect()->route('admin.not.found');
                }
                $supportCenterMesssage->delete();
                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }
}
