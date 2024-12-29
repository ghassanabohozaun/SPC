<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Projects;
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
        $articles = Article::limit(6)->get();
        $comments = Comment::limit(6)->get();

        /// Article Chart
        $articles = Article::select(DB::raw('Sum(views) as count'))->whereYear('created_at', date('Y'))->groupBy(DB::raw('Month(created_at)'))->pluck('count');
        $articleMonths = Article::select(DB::raw('Month(created_at) as month'))->whereYear('created_at', date('Y'))->groupBy(DB::raw('Month(created_at)'))->pluck('month');
        $articleData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($articleMonths as $index => $month) {
            $articleData[$month - 1] = $articles[$index];
        }

        /// tests Chart
        $tests = Test::select(DB::raw('Sum(number_times_of_use) as count'))->whereYear('created_at', date('Y'))->groupBy(DB::raw('Month(created_at)'))->pluck('count');
        $testMonths = Test::select(DB::raw('Month(created_at) as month'))->whereYear('created_at', date('Y'))->groupBy(DB::raw('Month(created_at)'))->pluck('month');
        $testData = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($testMonths as $index => $month) {
            $testData[$month - 1] = $tests[$index];
        }

        return view('admin.dashboard', compact('title', 'articles', 'comments', 'articleData', 'testData'));
    }

    // not Found
    public function notFound()
    {
        $title = __('general.not_found');
        return view('admin.errors.not-found', compact('title'));
    }

}
