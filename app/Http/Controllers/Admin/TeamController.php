<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class TeamController extends Controller
{
    use GeneralTrait;


    // teams Index
    public function index()
    {
        $title = __('menu.teams');
        $teams = Team::withoutTrashed()->orderByDesc('created_at')->paginate();
        return view('admin.teams.index', compact('title', 'teams'));
    }


    // create
    public function create()
    {
        $title = __('menu.add_new_team_member');
        return view('admin.teams.create', compact('title'));
    }


    // store team
    public function store(TeamRequest $request)
    {

        // save image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('/adminBoard/uploadedImages/teams//');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 348, 400);
        } else {
            $photo_path = '';
        }

        Team::create([
            'photo' => $photo_path,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'position_ar' => $request->position_ar,
            'position_en' => $request->position_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedIn' => $request->linkedIn,
            'type' => $request->type,
            'status' => 'on',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }


    // edit
    public function edit($id = null)
    {
        $title = __('teams.update_team_member');
        $team = Team::find($id);
        if (!$team) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.teams.update', compact('title', 'team'));
    }

    // update team
    public function update(TeamRequest $request)
    {

        $team = Team::find($request->id);
        if (!$team) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {
            if (!empty($team->photo)) {

                $image_path = public_path('/adminBoard/uploadedImages/teams//') . $team->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/teams//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 348, 400);
            } else {
                // $image_path = public_path('/adminBoard/uploadedImages/teams//') . $team->photo;
                // if (File::exists($image_path)) {
                //     File::delete($image_path);
                // }
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/teams//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 348, 400);
            }
        } else {
            if (!empty($team->photo)) {
                $photo_path = $team->photo;
            } else {
                $photo_path = '';
            }
        }


        $team->update([
            'photo' => $photo_path,
            'name_ar' => $request->name_ar,
            'name_en' => $request->name_en,
            'position_ar' => $request->position_ar,
            'position_en' => $request->position_en,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedIn' => $request->linkedIn,
            'type' => $request->type,
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }


    // trashed
    public function trashed()
    {
        $title = __('menu.trashed_teams');
        $teams = Team::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.teams.trashed', compact('title', 'teams'));
    }


    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $team = Team::find($request->id);
            if (!$team) {
                return redirect()->route('admin.not.found');
            }
            $team->delete();
            return $this->returnSuccessMessage(__('general.move_to_trash'));
        }
    }

    //  restore
    public function restore(Request $request)
    {

        if ($request->ajax()) {
            $team = Team::onlyTrashed()->find($request->id);
            if (!$team) {
                return redirect()->route('admin.not.found');
            }
            $team->restore();
            return $this->returnSuccessMessage(__('general.restore_success_message'));
        }
    }

    //  force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $team = Team::onlyTrashed()->find($request->id);
            if (!$team) {
                return redirect()->route('admin.not.found');
            }
            if (!empty($team->photo)) {
                $image_path = public_path('/adminBoard/uploadedImages/teams//') . $team->photo;
                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $team->forceDelete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }



    // change Status
    public function changeStatus(Request $request)
    {
        $team = Team::find($request->id);

        if ($request->switchStatus == 'false') {
            $team->status = null;
            $team->save();
        } else {
            $team->status = 'on';
            $team->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
