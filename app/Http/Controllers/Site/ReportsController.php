<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Report;

class ReportsController extends Controller
{
    // index
    public function index()
    {
        $title = __('index.reports');
        $reports = Report::where('status', 'on')->select('year')->distinct('year')->get();

        if ($reports) {
            return view('site.reports.report', compact('title', 'reports'));
        } else {
            return redirect(route('index'));
        }
    }


    // details
    public function details($year = null)
    {

        $reports = Report::where('status', 'on')->where('year', $year)->get();
        if ($reports) {
            $title = __('index.reports') .' '.  $year;

            return view('site.reports.report-details', compact('reports', 'year', 'title'));
        } else {
            return redirect(route('index'));
        }
    }

}
