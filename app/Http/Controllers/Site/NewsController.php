<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Traits\GeneralTrait;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
class NewsController extends Controller
{
    use GeneralTrait;

    function getNews()
    {
       if( LaravelLocalization::getCurrentLocale() == 'ar'){
        $news = Article::orderByDesc('id')->where('status', 'on')
         ->where(function ($q) {
            $q->where('language', 'ar')
                ->orWhere('language', 'ar_en');
        })->paginate(6);

       }else{
        $news = Article::orderByDesc('id')->where('status', 'on')
        ->where(function ($q) {
            $q->orWhere('language', 'ar_en');
        })->paginate(6);
       }
        if ($news) {
            $title = __('menu.articles');
            return view('site.news.new', compact('news' , 'title'));
        } else {
            return redirect(route('index'));
        }

    }

    function detailNew($title)
    {
        $title = returnSpaceBetweenString($title);
        $new = Article::orderByDesc('id')->where('title_' . Lang(), $title)->where('status', 'on')->first();
        if ($new) {
            $new->increment('views', 1);
            return view('site.news.new-details', compact('new'));
        } else {
            return redirect(route('index'));
        }
    }


    // send comment
    public function sendComment(CommentRequest $request)
    {
        Comment::create([
            'person_ip' => $request->ip(),
            'photo' => '',
            'person_name' => $request->person_name,
            'person_email' => $request->person_email,
            'commentary' => $request->commentary,
            'post_id' => $request->post_id,
            'gender' => 'male',
        ]);

        return $this->returnSuccessMessage(trans('index.add_success_comment'));
    }
}
