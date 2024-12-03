<section class="video-section" style="background-image: url({!! asset('site/assets/images/headerPhoto.png') !!});">
    <div class="auto-container">
        <div class="video-carousel owl-carousel owl-theme owl-dots-none owl-loaded owl-drag">

            <div class="owl-stage-outer">
                <div class="owl-stage"
                     style="transform: translate3d(-4680px, 0px, 0px); transition: all 0s ease 0s; width: 8190px;">


                    @foreach($lastProjects as $project)
                        <div class="owl-item animated" style="width: 1170px;">
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12 image-column">
                                    <figure class="image-box">
                                        <img
                                            src="{{asset('adminBoard/uploadedImages/projects/'.$project->photo)}}"
                                            alt="{!!  $project->{'title_'.Lang()} !!}">
                                    </figure>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 content-column">
                                    <div class="content-box">
                                        <div class="sec-title light">

                                            <h2>{!!  $project->{'title_'.Lang()} !!}</h2>
                                        </div>
                                        <div class="text">
                                            <p>{!! \Illuminate\Support\Str::limit(strip_tags($project->{'details_'.Lang()}),$limit = 300, $end = ' ...')!!} </p>
                                        </div>
                                        <div class="video-btn">
                                            <div class="shape"
                                                 style="background-image: url({!! asset('/site/assets/images/shape/shape-16.png') !!});">
                                            </div>
                                            <a href="{!! route('project-details',slug($project->{'title_'.Lang()}) )!!}">
                                                <i class="fa fa-arrow-alt-circle-right"></i>
                                                {!! __('index.read_more') !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="owl-nav">
                <button type="button" role="presentation" class="owl-prev"><span class="far fa-arrow-up"></span>
                </button>
                <button type="button" role="presentation" class="owl-next"><span class="far fa-arrow-down"></span>
                </button>
            </div>
            <div class="owl-dots">
                <button role="button" class="owl-dot"><span></span></button>
                <button role="button" class="owl-dot"><span></span></button>
                <button role="button" class="owl-dot active"><span></span></button>
            </div>
        </div>
    </div>
</section>
