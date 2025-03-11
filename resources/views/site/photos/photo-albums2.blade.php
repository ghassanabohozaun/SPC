@extends('layouts.site')
@section('title') {!! trans('frontend.home') !!} @endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
@endsection
@push('css')
    <link rel="stylesheet" type="text/css" href="{!! asset('site/assets/css/fancybox/jquery.fancybox.min.css') !!}">
@endpush
@section('content')

    <!-------------------------------------- Start Top Title Section  ------------------------------------->
    <div class="clearfix"></div>
    <div class="bradcam_area photos_bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h1>{!! $title !!}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------------------------------------- End Top Title Section  ------------------------------------->
    <!-------------------------------------- Start wrapper  ------------------------------------->
    <div class="pricing-table-wrapper module my_photo_albums_section">

        @if($photoAlbums->isEmpty())
            <h2 class="text-capitalize text-warning text-center">{!! trans('site.no_photo_albums') !!}</h2>
        @else
            <div class="grid-container my-about-us-section my_lead">
                <div id="gallery" class="container-fluid">
                    @foreach($photoAlbums as $photoAlbum)
                        <p>
                            <a href="{!! asset(\Illuminate\Support\Facades\Storage::url($photoAlbum->main_photo)) !!}"
                               data-fancybox="images-preview-{!! $photoAlbum->id !!}"
                               data-width="1500" data-height="1000"
                               data-thumbs='{"autoStart":true}'>
                                <img src="{!! asset(\Illuminate\Support\Facades\Storage::url($photoAlbum->main_photo)) !!}"
                                alt="{!! Lang()=='ar'? $photoAlbum->title_ar:$photoAlbum->title_en !!}"/>
                            </a>
                        </p>
                        <div style="display: none;">
                            @foreach(\App\File::get()->where('relation_id',$photoAlbum->id) as $file)
                                <a href="{!! asset(\Illuminate\Support\Facades\Storage::url($file->full_path_after_upload)) !!}"
                                   data-fancybox="images-preview-{!! $photoAlbum->id !!}"
                                   data-width="1500" data-height="1000"
                                   data-thumb="{!! asset(\Illuminate\Support\Facades\Storage::url($file->full_path_after_upload)) !!}"></a>
                            @endforeach

                        </div>
                    @endforeach

                </div>


            </div>
        @endif

    </div>
    <!-------------------------------------- End wrapper  ------------------------------------->


@endsection
@push('js')

    <script src="{!! asset('site/assets/js/fancybox/jquery.fancybox.min.js') !!}"></script>

    <script type="text/javascript">
        $('.card-deck a').fancybox({
            caption: function (instance, item) {
                return $(this).parent().find('.card-text').html();
            }
        });
    </script>
@endpush
