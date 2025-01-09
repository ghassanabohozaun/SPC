<div class="testimonial">
@forelse($clientOpinions as $key=>$clientOpinion)
    <!-- start testimonial  -->
        <div class="testimonial-text testimonial-block">

            <div>
                @if($clientOpinion->photo == null)
                    @if($clientOpinion->gender == trans('general.male'))
                        <img src="{{asset('site/assets/images/male.jpeg')}}"
                             alt="{!! Lang()=='ar'?$clientOpinion->opinion_ar:$clientOpinion->opinion_en !!}"
                             class="my_testimonial_img"
                        />
                    @elseif($clientOpinion->gender == trans('general.female'))
                        <img src="{{asset('site/assets/images/female.jpeg')}}"
                             alt="{!! Lang()=='ar'?$clientOpinion->opinion_ar:$clientOpinion->opinion_en !!}"
                             class="my_testimonial_img"
                        />
                    @elseif($clientOpinion->gender == trans('general.others'))
                        <img src="{{asset('site/assets/images/others.png')}}"
                             alt="{!! Lang()=='ar'?$clientOpinion->opinion_ar:$clientOpinion->opinion_en !!}"
                             class="my_testimonial_img"
                        />
                    @endif
                @else
                    <img
                        src="{!! asset(\Illuminate\Support\Facades\Storage::url($clientOpinion->photo)) !!}"
                        alt="{!! Lang()=='ar'?$clientOpinion->opinion_ar:$clientOpinion->opinion_en !!}"
                        class="my_testimonial_img"
                    />
                @endif
                <p class="my_lead">{!! Lang()=='ar'?$clientOpinion->opinion_ar:$clientOpinion->opinion_en !!}</p>
            </div>

            <div>
                <h6>
                    {!! Lang()=='ar'?$clientOpinion->client_name_ar:$clientOpinion->client_name_en !!}

                    @if( Lang()=='ar')
                        @if($clientOpinion->job_title_ar != null)
                            - <span>
                                    {!! $clientOpinion->job_title_ar !!}
                                </span>
                        @endif
                    @else
                        @if($clientOpinion->job_title_en != null)
                            - <span>
                                    {!! $clientOpinion->job_title_en !!}
                                </span>
                        @endif
                    @endif

                </h6>
                @for ($i = 1; $i <= $clientOpinion->rating; $i++)
                    <img src="{!! asset('site/assets/images/icons/star.png') !!}"
                         alt="icon" class="my_testimonial_star_icon">
                @endfor
            </div>

        </div>
        <!-- testimonial -->
    @empty
        {{trans('site.no_testimonials')}}
    @endforelse
    <div class="container-fluid text-center">
        <div class="row {!! $clientOpinions->hasPages() ? 'my_pagination':'' !!}">
            {{$clientOpinions->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
</div>

