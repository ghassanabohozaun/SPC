<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ReportController extends Controller
{
    use GeneralTrait;

    // create
    public function index()
    {
        $reports = Report::orderByDesc('created_at')->paginate(15);
        $title = __('menu.reports');
        return view('admin.reports.index', compact('reports', 'title'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_report');
        return view('admin.reports.create',compact('title'));
    }

    // store
    public function store(ReportRequest $request)
    {

        $report = Report::where('year' ,$request->year)->where('type',$request->type)->first();
        if($report){
           return   $this->returnError(__('reports.this_type_of_report_has_been_added_for_this_year'),500);
        }

        $report = Report::onlyTrashed()->where('year' ,$request->year)->where('type',$request->type)->first();
        if($report){
           return   $this->returnError(__('reports.has_delete'),500);
        }

        // save File
        if ($request->hasFile('file')) {
            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/reports');
        } else {
            $file = '';
        }



        Report::create([
            'file' => $file,
            'year' => $request->year,
            'type' => $request->type,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }

    // edit
    public function edit($id)
    {
        $report = Report::findOrFail($id);
        return view('admin.reports.update', compact('report'));
    }

    // update
    public function update(ReportRequest $request)
    {

        $report = Report::findORFail($request->id);

        // save File

        if ($request->hasFile('file')) {
            $file = $this->saveFile($request->file('file'), 'adminBoard/uploadedFiles/reports');

            $file_path = public_path("\adminBoard\uploadedFiles\\reports\\") . $report->file;
            if (File::exists($file_path))
            {
              File::delete($file_path);
            }
        } else {
            $file = $report->file;
        }

        $report->update([
            'file' => $file,
            'year' => $request->year,
            'type' => $request->type,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // trashed
    public function trashed()
    {
        $title = __('menu.trashed_reports');
        $reports = Report::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.reports.trashed', compact('title', 'reports'));
    }


    // destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $report = Report::find($request->id);
                if (!$report) {
                    return redirect()->route('admin.not.found');
                }
                $report->delete();
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }


    //  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $report = Report::onlyTrashed()->find($request->id);
                if (!$report) {
                    return redirect()->route('admin.not.found');
                }
                $report->restore();
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch
    }

    //  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {

                $report = Report::onlyTrashed()->find($request->id);


                if (!$report) {
                    return redirect()->route('admin.not.found');
                }

                $file_path = public_path("\adminBoard\uploadedFiles\\reports\\") . $report->file;

                if (File::exists($file_path))
                {
                  File::delete($file_path);
                }

                $report->forceDelete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        }//end catch

    }


    public function changeStatus(Request $request)
    {

        $report = Report::find($request->id);

        if ($request->switchStatus == 'false') {
            $report->status = null;
            $report->save();
        } else {
            $report->status = 'on';
            $report->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
