<div class="testimonial">
    @forelse($testimonials as $key=>$testimonial)
        @if (Lang() == 'en')
            @if ($testimonial->name_en != null)
                @include('site.testimonials.paginig')
            @endif
        @else
            @if ($testimonial->name_ar != null)
                @include('site.testimonials.paginig')
            @endif
        @endif
    @empty
        <div class="testimonial-text testimonial-block">
            <div>
                <h2 class="text-capitalize text-warning text-center"> {{ trans('site.no_testimonials') }}</h2>
            </div>
        </div>
    @endforelse
    <div class="container-fluid text-center">
        <div class="row {!! $testimonials->hasPages() ? 'my_pagination' : '' !!}">
            {{ $testimonials->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
</div>
