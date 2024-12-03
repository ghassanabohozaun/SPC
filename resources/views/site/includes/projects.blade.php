@if(!$lastProjects->isEmpty())
    <section class="case-page-section">
        <div class="auto-container">

            <div class="sec-title style-two centred">
                <span class="top-text">{!! __('index.about_our_projects') !!}</span>
                <h2>{!! __('index.our_projects') !!}</h2>
                <p>
                    {!! fixedTexts()->{'project_details_'.Lang()} !!}
                </p>
            </div>

            <div class="row clearfix justify-content-center">

                @foreach($lastProjects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-12 case-block">
                        <div class="case-block-one">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <img src="{{asset('adminBoard/uploadedImages/projects/'.$project->photo)}}"
                                         alt="{!!  $project->{'title_'.Lang()} !!}">
                                </figure>
                                <div class="lower-content">
                                    <div class="shape"
                                         style="background-image: url('{!! asset('/site/assets/images/shape/shape-11.png') !!}');">
                                    </div>
                                    <div class="inner">
                                        <div class="text">
                                            <div class="category">
                                                <a href="{!!$project->type =='current'  ? route('projects','current') :route('projects','previous') !!}">
                                                    # {!! $project->type =='current'  ? __('index.current_project'):  __('index.previous_project')!!}
                                                </a>
                                            </div>
                                            <h3>
                                                <a href="{!! route('project-details',slug($project->{'title_'.Lang()}) )!!}">{!!  $project->{'title_'.Lang()} !!}</a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
@endif

