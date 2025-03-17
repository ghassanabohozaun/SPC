<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Test;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('dashboard.admin_panel');
        $latest_articles = Article::orderByDesc('created_at')->limit(6)->get();
        $latest_tests = Test::orderByDesc('created_at')->limit(12)->get();

        /// Article Chart
        $articlesViews = Article::select(DB::raw('Sum(views) as count'))->groupBy(DB::raw('Month(created_at)'))->pluck('count');
        $articleMonths = Article::select(DB::raw('Month(created_at) as month'))->groupBy(DB::raw('Month(created_at)'))->pluck('month');
        $articleData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($articleMonths as $index => $month) {
            $articleData[$month - 1] = $articlesViews[$index];
        }

        /// tests Chart
        $tests = Test::select(DB::raw('Sum(number_times_of_use) as count'))->groupBy(DB::raw('Month(created_at)'))->pluck('count');
        $testMonths = Test::select(DB::raw('Month(created_at) as month'))->groupBy(DB::raw('Month(created_at)'))->pluck('month');
        $testData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($testMonths as $index => $month) {
            $testData[$month - 1] = $tests[$index];
        }

        return view('admin.dashboard', compact('title', 'latest_articles', 'latest_tests', 'articleData', 'testData'));
    }

    // not Found
    public function notFound()
    {
        $title = __('general.not_found');
        return view('admin.errors.not-found', compact('title'));
    }
}
