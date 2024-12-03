<?php

namespace App\Http\Controllers\Site;

use App\File;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Traits\GeneralTrait;

class TeamsController extends Controller
{
    use GeneralTrait;


    // founders
    public function founders()
    {
        $title = __('index.founders');

        $founders = Team::orderBy('created_at','asc')->where('status', 'on')->where('type', 'founder')->get();
        return view('site.founders', compact('title', 'founders'));
    }

    // directors
    public function directors()
    {
        $title = __('index.directors');

        $directors = Team::orderBy('created_at','asc')->where('status', 'on')->where('type', 'director')->get();
        return view('site.directors', compact('title', 'directors'));
    }


    // team
    public function team()
    {
        $title = __('index.team');

        $teams = Team::orderBy('created_at','asc')->where('status', 'on')->where('type', 'member')->get();
        return view('site.team', compact('title', 'teams'));
    }


}
