<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Traits\GeneralTrait;
use File;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    use GeneralTrait;

    // index
    public function index($id)
    {
        $title = __('menu.comments');
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('admin.not.found');
        }

        $comments  = $article->comments()->withoutTrashed()->orderByDesc('created_at')->paginate(15);
        //$comments = Comment::withoutTrashed()->orderByDesc('created_at')->where('post_id', $id)->paginate(15);
        return view('admin.articles.comments.index', compact('title', 'comments', 'id'));
    }

    //  trashed articles
    public function trashed($id)
    {
        $title = __('menu.trashed_articles');
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $article = Article::find($id);
        if (!$article) {
            return redirect()->route('admin.not.found');
        }

        $trashedComments  = $article->comments()->onlyTrashed()->orderByDesc('created_at')->paginate(15);
        //$trashedComments = Comment::onlyTrashed()->orderByDesc('created_at')->paginate(15);
        return view('admin.articles.comments.trashed_comments', compact('title', 'trashedComments', 'id'));
    }


    // create
    public function create($id)
    {
        if (!$id) {
            return redirect()->route('admin.not.found');
        }

        $title = __('menu.add_new_comment');
        return view('admin.articles.comments.create', compact('title', 'id'));
    }


    // store
    public function store(CommentRequest $request)
    {

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = public_path('adminBoard/uploadedImages/articles/comments');
            $photo_path = $this->saveResizeImage($image, $destinationPath, 250, 250);
        } else {
            $photo_path = '';
        }

        Comment::create([
            'person_ip' => $request->ip(),
            'person_name' => $request->person_name,
            'person_email' => $request->person_email,
            'commentary' => $request->commentary,
            'status' => 'on',
            'gender' => $request->gender,
            'article_id' => $request->id,
            'photo' => $photo_path,
        ]);

        return $this->returnSuccessMessage(__('general.add_success_message'));
    }


    // destroy
    public function destroy(Request $request)
    {
        try {
            if ($request->ajax()) {
                $comment = Comment::find($request->id);
                if (!$comment) {
                    return redirect()->route('admin.not.found');
                }
                if ($comment->delete()) {
                    return $this->returnSuccessMessage(__('general.move_to_trash'));
                } else {
                    return $this->returnError(__('general.delete_error_message'), 404);
                }
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch
    }


    //  restore
    public function restore(Request $request)
    {
        try {
            if ($request->ajax()) {
                $comment = Comment::onlyTrashed()->find($request->id);
                if (!$comment) {
                    return redirect()->route('admin.not.found');
                }

                if ($comment->restore()) {
                    return $this->returnSuccessMessage(__('general.restore_success_message'));
                } else {
                    return $this->returnError(__('general.restore_error_message'), 404);
                }
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

                $comment = Comment::onlyTrashed()->find($request->id);

                if (!$comment) {
                    return redirect()->route('admin.not.found');
                }

                if (!empty($comment->photo)) {
                    $image_path = public_path("\adminBoard\uploadedImages\articles\comments\\") . $comment->photo;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }

                if ($comment->forceDelete()) {
                    return $this->returnSuccessMessage(__('general.delete_success_message'));
                } else {
                    return $this->returnError(__('general.delete_error_message'), 404);
                }
            }
        } catch (\Exception $exception) {
            return $this->returnError(__('general.try_catch_error_message'), 500);
        } //end catch

    }


    // change Status
    public function changeStatus(Request $request)
    {
        $comment = Comment::find($request->id);

        if ($request->switchStatus == 'false') {
            $comment->status = null;
            $comment->save();
        } else {
            $comment->status = 'on';
            $comment->save();
        }

        return $this->returnSuccessMessage(__('general.change_status_success_message'));
    }
}
