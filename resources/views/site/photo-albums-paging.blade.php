@if($photoAlbums->isEmpty())
    <h2 class="text-capitalize text-warning text-center">{!! trans('site.no_photo_albums') !!}</h2>
@else
    <div class="container my_photos_section my_lead">
        <div id="gallery" class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($photoAlbums as $photoAlbum)
                <div class="col">
                    <a href="{!! asset(\Illuminate\Support\Facades\Storage::url($photoAlbum->main_photo)) !!}"
                       data-fancybox="images-preview-{!! $photoAlbum->id !!}"
                       data-width="1500" data-height="1000"
                       data-thumbs='{"autoStart":true}'>

                        <div class="card">
                            <div class="card-body">
                                <p class="card-text">
                                    {!! Lang()=='ar'?$photoAlbum->title_ar:$photoAlbum->title_en !!}
                                </p>
                            </div>

                            <img class="card-img-top"
                                 src="{!! asset(\Illuminate\Support\Facades\Storage::url($photoAlbum->main_photo)) !!}"
                                 alt="{!! Lang()=='ar'?$photoAlbum->title_ar:$photoAlbum->title_en !!}">
                        </div>
                    </a>

                    <div style="display: none;">
                        @foreach(\App\File::get()->where('relation_id',$photoAlbum->id) as $file)
                            <a href="{!! asset(\Illuminate\Support\Facades\Storage::url($file->full_path_after_upload)) !!}"
                               data-fancybox="images-preview-{!! $photoAlbum->id !!}"
                               data-width="1500" data-height="1000"
                               data-thumb="{!! asset(\Illuminate\Support\Facades\Storage::url($file->full_path_after_upload)) !!}"></a>
                        @endforeach
                    </div>
                </div>


            @endforeach

        </div>
        <div class="container-fluid text-center">
            <div class="row {!! $photoAlbums->hasPages() ? 'my_pagination':'' !!} ">
                {{$photoAlbums->links('vendor.pagination.bootstrap-4')}}
            </div>
        </div>

    </div>
@endif
