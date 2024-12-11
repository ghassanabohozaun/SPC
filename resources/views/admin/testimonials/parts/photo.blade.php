@if ($testimonial->photo == null)
    @if ($testimonial->gender == __('general.male'))
        <img src="{{ asset('adminBoard/images/male.jpeg') }}" class="img-fluid img-thumbnail table-image" width="30"
            height="20" />
    @elseif($testimonial->gender == __('general.female'))
        <img src="{{ asset('adminBoard/images/female.jpeg') }}" class="img-fluid img-thumbnail table-image" width="30"
            height="20" />
    @endif
@else
    <img src="{{ asset('adminBoard/uploadedImages/testimonials/' . $testimonial->photo) }}"
        class="img-fluid img-thumbnail table-image" width="30" height="20" />
@endif
