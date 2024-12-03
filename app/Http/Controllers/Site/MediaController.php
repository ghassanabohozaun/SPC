<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\PhotoAlbum;
use App\Models\Video;
use App\Traits\GeneralTrait;
use App\Upload_Files;

class MediaController extends Controller
{
    use GeneralTrait;


    // photos Albums
    public function photosAlbums()
    {
        $title = __('index.our_photos_albums');

        $photosAlbumsYears = PhotoAlbum::where('status', 'on')->select('year')->distinct('year')->get();
        $photosAlbums = PhotoAlbum::orderByDesc('id')->where('status', 'on')->get();
        return view('site.photos.our-photos', compact('title', 'photosAlbums', 'photosAlbumsYears'));
    }


    function photosAlbumsDetails($title)
    {
        $title = returnSpaceBetweenString($title);

        $photoAlbum = PhotoAlbum::orderByDesc('id')->where('title_' . Lang(), $title)->where('status', 'on')->first();
        if(!$photoAlbum){
            return  redirect()->route('index');
        }

        $photoAlbumID = $photoAlbum->id;
        $photos = Upload_Files::where('relation_id', $photoAlbumID)->orderByDesc('created_at')->get();


        if ($photoAlbum) {
            return view('site.photos.photo-details', compact('photoAlbum', 'photos'));
        } else {
            return redirect(route('index'));
        }
    }


    // videos
    public function videos()
    {
        $title = __('index.our_videos');

        $videos = Video::orderByDesc('id')->where('status', 'on')->paginate(8);
        return view('site.videos', compact('title', 'videos'));
    }


}
