<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use File;

class BooksController extends Controller
{

    use GeneralTrait;

    // index
    public function index()
    {
        $title = __('menu.books');
        $books = Book::withoutTrashed()->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.books.index', compact('title', 'books'));
    }

    // create
    public function create()
    {
        $title = __('menu.add_new_book');
        return view('admin.books.create', compact('title'));
    }

    // store
    public function store(BookRequest $request)
    {

        // book photo
        if ($request->hasFile('photo')) {
            $photo_name  = $request->file('photo');
            $photo_path_destination = public_path('/adminBoard/uploadedImages/books//');
            $photo = $this->saveImage($photo_name, $photo_path_destination);
        } else {
            $photo = '';
        }


        // book file
        if ($request->hasFile('file')) {
            $file_name = $request->file('file');
            $file_public_path =  public_path('/adminBoard/uploadedFiles/books//');
            $file = $this->saveFile($file_name, $file_public_path);
        } else {
            $file = '';
        }

        $site_lang_ar = setting()->site_lang_ar;
        $book =  Book::create(
            [
                'title_en_slug' => slug($request->title_en),
                'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : '',
                'title_en' => $request->title_en,
                'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : '',
                'abstract_en' => $request->abstract_en,
                'abstract_ar' => $site_lang_ar == 'on' ? $request->abstract_ar : '',
                'publish_date' => $request->publish_date,
                'publisher_name' => $request->publisher_name,
                'status' => 'on',
                'photo' => $photo,
                'file' => $file,
                'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
            ]
        );

        if ($book) {
            return $this->returnSuccessMessage(__('general.add_success_message'));
        }
    }

    // edit
    public function edit($id)
    {
        $title = __('books.update_book');
        $book = Book::find($id);
        if (!$book) {
            return redirect()->route('admin.not.found');
        }
        return view('admin.books.update', compact('title', 'book'));
    }

    // update
    public function update(BookRequest $request)
    {

        //return response()->json($request->all(), 200);

        $book = Book::find($request->id);
        if (!$book) {
            return redirect()->route('admin.not.found');
        }

        // photo upload
        if ($request->hasFile('photo')) {
            if (!empty($book->photo)) {

                //delete old photo
                $photo_public_path = public_path('/adminBoard/uploadedImages/books//') . $book->photo;
                if (File::exists($photo_public_path)) {
                    File::delete($photo_public_path);
                }

                // upload new photo
                $photo_name = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/books//');
                $photo = $this->saveImage($photo_name, $photo_destination);
            } else {

                $photo_name = $request->file('photo');
                $photo_destination = public_path('/adminBoard/uploadedImages/books//');
                $photo  = $this->saveImage($photo_name, $photo_destination);
            }
        } else {
            if (!empty($book->photo)) {
                $photo = $book->photo;
            } else {
                $photo = '';
            }
        }



        // file upload
        if ($request->hasFile('file')) {
            if (!empty($book->file)) {

                //delete old file
                $file_public_path = public_path('/adminBoard/uploadedFiles/books//') . $book->file;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }

                // upload new file
                $file_name = $request->file('file');
                $file_destination = public_path('/adminBoard/uploadedFiles/books//');
                $file = $this->saveFile($file_name, $file_destination);
            } else {
                $file_name = $request->file('file');
                $file_destination = public_path('/adminBoard/uploadedFiles/books//');
                $file  = $this->saveFile($file_name, $file_destination);
            }
        } else {
            if (!empty($book->file)) {
                $file = $book->file;
            } else {
                $file = '';
            }
        }



        $site_lang_ar = setting()->site_lang_ar;
        $book->update([
            'title_en_slug' => slug($request->title_en),
            'title_ar_slug' => $site_lang_ar == 'on' ? slug($request->title_ar) : '',
            'title_en' => $request->title_en,
            'title_ar' => $site_lang_ar == 'on' ? $request->title_ar : '',
            'abstract_en' => $request->abstract_en,
            'abstract_ar' => $site_lang_ar == 'on' ? $request->abstract_ar : '',
            'publish_date' => $request->publish_date,
            'publisher_name' => $request->publisher_name,
            'status' => 'on',
            'photo' => $photo,
            'file' => $file,
            'language' => $site_lang_ar == 'on' ? 'ar_en' : 'en',
        ]);

        return $this->returnSuccessMessage(__('general.update_success_message'));
    }

    // destroy
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $book = Book::find($request->id);
            if (!$book) {
                return redirect()->route('admin.not.found');
            }

            if ($book->delete()) {
                return $this->returnSuccessMessage(__('general.move_to_trash'));
            } else {
                return $this->returnError(__('general.delete_error_message'), 400);
            }
        }
    }

    // trashed
    public function trashed()
    {
        $title = __("general.trashed");
        $trashedBooks   = Book::onlyTrashed()->orderByDesc('deleted_at')->paginate(15);
        return view('admin.books.trashed', compact('title', 'trashedBooks'));
    }

    // restore
    public function restore(Request $request)
    {
        if ($request->ajax()) {
            $book = Book::onlyTrashed()->find($request->id);
            if (!$book) {
                return redirect()->route('admin.not.found');
            }
            $book->restore();
            return $this->returnSuccessMessage(__('general.restore_success_message'));
        }
    }

    // force delete
    public function forceDelete(Request $request)
    {
        if ($request->ajax()) {
            $book = Book::onlyTrashed()->find($request->id);

            if (!$book) {
                return redirect()->route('admin.not.found');
            }

            if (!empty($book->photo)) {
                $photo_public_path = public_path('/adminBoard/uploadedImages/books//') . $book->photo;
                if (File::exists($photo_public_path)) {
                    File::delete($photo_public_path);
                }
            }

            if (!empty($book->file)) {
                $file_public_path = public_path('/adminBoard/uploadedFiles/books//') . $book->file;
                if (File::exists($file_public_path)) {
                    File::delete($file_public_path);
                }
            }

            $book->forceDelete();
            return $this->returnSuccessMessage(__('general.delete_success_message'));
        }
    }

    // change status
    public function changeStatus(Request $request)
    {
        if ($request->ajax()) {
            $book  = Book::find($request->id);
            if (!$book) {
                return redirect()->route('admin.not.found');
            }

            if ($request->statusSwitch == 'true') {
                $book->status = 'on';
                $book->save();
            } else {
                $book->status = '';
                $book->save();
            }

            return $this->returnSuccessMessage(__('general.change_status_success_message'));
        }
    }
}
