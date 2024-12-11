<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.articles');
        $articles = Article::withoutTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.articles.index', compact('title', 'articles'));
    }


    // create
    public function create()
    {
        $title = __('menu.add_new_article');
        return view('admin.articles.create', compact('title'));
    }


    // store
    public function store(ArticleRequest $request)
    {

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/articles');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
        } else {
            $photo_path = '';
        }

        $site_lang_ar = setting()->site_lang_ar;
        Article::create([

            'title_en_slug' => slug($request->title_en),
            'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : null,
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'abstract_en' => $request->abstract_en,
            'abstract_ar' => $site_lang_ar == 'on' ? $request->abstract_ar : null,
            'publish_date' => $request->publish_date,
            'publisher_name' => $request->publisher_name,
            'status' => 'on',
            'photo' => $photo_path,
            'language' => 'ar_en',
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }


    // edit
    public function edit($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }
        $title = __('articles.update_article');
        $article = Article::find($id);

        if (!$article) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.articles.update', compact('title', 'article'));
    }

    // update
    public function update(ArticleRequest $request)
    {

        $article = Article::find($request->id);

        if (!$article) {
            return redirect()->route('admin.not.found');
        }

        if ($request->hasFile('photo')) {

            $image_path = public_path("/adminBoard/uploadedImages/articles//") . $article->photo;
            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            if (!empty($article->photo)) {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/articles//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            } else {
                $image = $request->file('photo');
                $destinationPath = public_path('/adminBoard/uploadedImages/articles//');
                $photo_path = $this->saveResizeImage($image, $destinationPath, 500, 500);
            }
        } else {
            if (!empty($article->photo)) {
                $photo_path = $article->photo;
            } else {
                $photo_path = '';
            }
        }


        $site_lang_ar = setting()->site_lang_ar;
        $article->update([
            'title_en_slug' => slug($request->title_en),
            'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : null,
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : null,
            'abstract_en' => $request->abstract_en,
            'abstract_ar' => $site_lang_ar == 'on' ? $request->abstract_ar : null,
            'publish_date' => $request->publish_date,
            'publisher_name' => $request->publisher_name,
            'status' => 'on',
            'photo' => $photo_path,
            'language' => 'ar_en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $article = Article::find($request->id);
                if (!$article) {
                    return redirect()->route('admin.not.found');
                }
                $article->delete();
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch
    }

    //  trashed
    public function trashed()
    {
        $title = __('menu.trashed_articles');
        $trashedArticles = Article::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.articles.trashed-articles', compact('title', 'trashedArticles'));
    }


    //  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $article = Article::onlyTrashed()->find($request->id);
                if (!$article) {
                    return redirect()->route('admin.not.found');
                }
                $article->restore();
                return $this->returnSuccessMessage(__('general.restore_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch
    }

    //  force delete
    public function forceDelete(Request $request)
    {
        try {
            if ($request->ajax()) {

                $article = Article::onlyTrashed()->find($request->id);

                if (!$article) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($article->photo)) {
                    $image_path = public_path("/adminBoard/uploadedImages/articles//") . $article->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                $article->forceDelete();

                return $this->returnSuccessMessage(__('general.delete_success_message'));
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch

    }


    // change Status
    public function changeStatus(Request $request)
    {
        $article = Article::find($request->id);

        if ($request->switchStatus == 'false') {
            $article->status = null;
            $article->save();
        } else {
            $article->status = 'on';
            $article->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
