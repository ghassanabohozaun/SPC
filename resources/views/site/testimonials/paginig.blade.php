   <!-- start testimonial  -->
   <div class="testimonial-text testimonial-block">

       <div>
           @if ($testimonial->photo == null)
               @if ($testimonial->gender == 'male')
                   <img src="{{ asset('site/assets/images/male.jpeg') }}" alt="{!! $testimonial->{'opinion_' . Lang()} !!}"
                       class="my_testimonial_img" />
               @elseif($testimonial->gender == 'female')
                   <img src="{{ asset('site/assets/images/female.jpeg') }}" alt="{!! $testimonial->{'opinion_' . Lang()} !!}"
                       class="my_testimonial_img" />
               @endif
           @else
               <img src="{!! asset('adminBoard/uploadedImages/testimonials/' . $testimonial->photo) !!}" alt="{!! $testimonial->{'opinion_' . Lang()} !!}" class="my_testimonial_img" />
           @endif
           <p class="my_lead">{!! $testimonial->{'opinion_' . Lang()} !!}</p>
       </div>

       <div>
           <h6>
               {!! $testimonial->{'name_' . Lang()} !!}
               @if (Lang() == 'ar')
                   @if ($testimonial->job_title_ar != null)
                       - <span>
                           {!! $testimonial->job_title_ar !!}
                       </span>
                   @endif
               @else
                   @if ($testimonial->job_title_en != null)
                       - <span>
                           {!! $testimonial->job_title_en !!}
                       </span>
                   @endif
               @endif
           </h6>
           @for ($i = 1; $i <= $testimonial->rating; $i++)
               <img src="{!! asset('site/assets/images/icons/star.png') !!}" alt="icon" class="my_testimonial_star_icon">
           @endfor
       </div>

   </div>
   <!-- testimonial -->
