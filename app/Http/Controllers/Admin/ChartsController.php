<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mawhob;
use App\Models\Revenue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function mwhobs_chart()
    {
        $mawhobs = Mawhob::select(DB::raw('COUNT(*) as count'), DB::raw('Month(created_at) as month'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('count', 'month');

        foreach ($mawhobs->keys() as $month_number) {
            $labels[] = date('F', mktime(0, 0, 0, $month_number, 1));
        }

        $chart['labels'] = $labels;
        $chart['datasets'][0]['name'] = __('dashboard.new_mawobs_growth') ;
        $chart['datasets'][0]['values'] = $mawhobs->values()->toArray();

        return response()->json($chart);
    }

    public function revenue_chart()
    {
        $revenues = Revenue::select(DB::raw('SUM(value) as count'), DB::raw('Month(created_at) as month'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('Month(created_at)'))
            ->pluck('count', 'month');

        foreach ($revenues->keys() as $month_number) {
            $labels[] = date('F', mktime(0, 0, 0, $month_number, 1));
        }

        $chart['labels'] = $labels;
        $chart['datasets'][0]['name'] = __('dashboard.new_revenues_growth') ;
        $chart['datasets'][0]['values'] = $revenues->values()->toArray();

        return response()->json($chart);
    }
}
