<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class TrainingController extends Controller
{

    use GeneralTrait;
    //////////////////////////////////////////////////
    // index

    public function index()
    {

        $title = 'Trainings';
        $trainings = Training::paginate(15);
        return view('admin.trainings.index', compact('title', 'trainings'));
    }






    //////////////////////////////////////////////////
    // destroy

    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::find($request->id);
            if (!$training) {
                return $this->returnError('Training not found', 404);
                //return redirect()->route('admin.not.found');
            }

            if ($training->delete()) {
                return $this->returnSuccessMessage('Training deleted successfully');
            } else {
                return $this->returnError('Training not deleted', 400);
            }
        }
    }

    ////////////////////////////////////////////////////////////////////////////////
    // get trashed

    public function getTrashed()
    {
        $title = 'Trashed';
        $trainings   = Training::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);

        return view('admin.trainings.trashed', compact('title', 'trainings'));
    }

    ////////////////////////////////////////////////////////////////////////////////
    // restore

    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::onlyTrashed()->find($request->id);
            if (!$training) {
                return $this->returnError('Training not found', 404);
            }
            $training->restore();
            //return response()->json($training, 200);
            //return $this->returnData()
            return $this->returnSuccessMessage('Training restored successfully');
        }
    }

    ///////////////////////////////////////////////////////////////////////////////
    // force delete

    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $training = Training::onlyTrashed()->find($request->id);

            if (!$training) {
                return $this->returnError('Training not found', 404);
            }

            $training->forceDelete();
            return $this->returnSuccessMessage('Training force deleted successfully');
        }
    }
    /////////////////////////////////////////////////////////////////////////////////
    /// change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $training  = Training::find($request->id);
            if (!$training) {
                return $this->returnError('Training not found', 404);
            }

            //return response()->json($request->id, 200);

            if ($request->statusSwitch == 'true') {
                $training->status = 'on';
                $training->save();
            } else {
                $training->status = '';
                $training->save();
            }

            return $this->returnSuccessMessage('Training status updated successfully');
        }
    }
}
