<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use App\Traits\GeneralTrait;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use GeneralTrait;

    ////////////////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = __('dashboard.admin_panel');
        $articles = Article::limit(6)->get();
        $comments = Comment::limit(6)->get();

        /// Article Chart
        $Articles = Article::select(DB::raw("Sum(views) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $ArticleMonths = Article::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $ArticleData = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($ArticleMonths as $index => $month) {
            $ArticleData[$month - 1] = $Articles[$index];
        }

        /// Project Chart
        $Projects = Projects::select(DB::raw("Sum(views) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');
        $ProjectMonths = Projects::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');
        $ProjectData = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($ProjectMonths as $index => $month) {
            $ProjectData[$month - 1] = $Projects[$index];
        }

        return view('admin.dashboard', compact('title', 'articles', 'comments', 'ArticleData', 'ProjectData'));
    }

    ////////////////////////////////////////////////////////
    /// not Found
    public function notFound()
    {
        $title = __('general.not_found');
        return view('admin.errors.not-found', compact('title'));
    }
}
