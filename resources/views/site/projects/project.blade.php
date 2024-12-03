@extends('layouts.site')
@section('title')
    {!! Lang()=='ar' ? setting()->site_title_ar : setting()->site_title_en !!}
@endsection
@section('metaTags')
    <meta name="description"
          content="{!! Lang()=='ar' ? setting()->site_description_ar : setting()->site_description_en !!}">
    <meta name="keywords"
          content="{!! Lang()=='ar' ? setting()->site_keywords_ar : setting()->site_keywords_en !!}">
    <meta name="application-name" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
    <meta name="author" content="{!! Lang()=='ar' ? setting()->site_name_ar : setting()->site_name_en !!}"/>
@endsection
@push('css')
@endpush
@section('content')

    <div class="boxed_wrapper {!! Lang()=='ar' ? 'rtl':'' !!}"
         style="background-image: url({!! asset('/site/assets/images/shape/shape-23.png') !!});">

        <!-- header -->
        @include('site.includes.header')
        <!-- header end -->


        <!-- Page Title -->
        <section class="page-title"
                 style="background-image: url({!! asset('site/assets/images/headerPhoto.png') !!});">
            <div class="auto-container">
                <div class="content-box">
                    <div class="title">
                        <h1>{!! $type == 'previous' ? __('index.previous_project') : __('index.current_project')  !!}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        &nbsp;
                    </ul>
                </div>
            </div>
        </section>
        <!-- End Page Title -->

        @if( $projects->isEmpty())
        <!-- team-section -->
        <section class="team-section centred">
            <h1 class="my-h1">{!! __('index.no_data_found') !!}</h1>
        </section>
        @else


        <!-- case-page-section -->
        <section class="case-page-section list-view">
            <div class="auto-container">

                @foreach ($projects as $project)

                    <div class="case-block-four">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <img src="{{asset('adminBoard/uploadedImages/projects/'. $project->photo)}}"
                                         alt="{{ $project->{'title_'.Lang()} }}">
                                </figure>
                            </div>
                            <div class="content-box">
                                <div class="text my-word-break">
                                    <div class="category ">
                                        <a href="#"># {!! $project->type == 'previous' ? __('index.previous_project') : __('index.current_project')  !!} </a>
                                    </div>
                                    <h3>
                                        <a href="{!! route('project-details',slug($project->{'title_'.Lang()}) )!!}">{{ $project->{'title_'.Lang()} }}</a>
                                    </h3>
                                    <p>
                                        {!! \Illuminate\Support\Str::limit(strip_tags($project->{'details_'.Lang()}),$limit = 300, $end = ' ...')!!}
                                    </p>
                                </div>
                                <ul class="info-box clearfix">
                                    @if($project->word != null)
                                        <li class="share">
                                            <i class="far fa-file-word"></i>
                                            <a class="font-weight-bold"
                                               href="{{asset('adminBoard/uploadedFiles/project/'. $project->word)}}"
                                               target="_blank">
                                                {!! __('general.download') !!}
                                            </a>
                                        </li>
                                    @endif

                                    @if($project->file != null)
                                        <li class="share">
                                            <i class="fas fa-file-pdf"></i>
                                            <a class="font-weight-bold"
                                               href="{{asset('adminBoard/uploadedFiles/project/'. $project->file)}}"
                                               target="_blank">
                                                {!! __('general.download') !!}
                                            </a>
                                        </li>
                                    @endif

                                    @if ( $project->publications()->first() !=null  )
                                        <li class="share">
                                            <i class="fas fa-book"></i>

                                                <a  class="font-weight-bold "
                                                href="{!! route('project-case-study',slug($project->{'title_'.Lang()}) )!!}">
                                                    {{{__('index.visit_case_studies')}}}
                                                </a>

                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach


                <div class="pagination-wrapper centred">
                    {{ $projects->links('vendor.pagination.my-bootstrap') }}
                </div>


            </div>
        </section>
        <!-- case-page-section end -->
        @endif


        <!-- main-footer -->
        @include('site.includes.footer')
        <!-- main-footer end -->


    </div>

@endsection
