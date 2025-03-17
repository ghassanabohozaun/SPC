@if ($testimonial->photo == null || $testimonial->photo == '')
    @if ($testimonial->gender == 'male')
        <img src="{{ asset('adminBoard/images/male.jpeg') }}" class="img-fluid img-thumbnail table-image" width="50"
            height="20" />
    @elseif($testimonial->gender == 'female')
        <img src="{{ asset('adminBoard/images/female.jpeg') }}" class="img-fluid img-thumbnail table-image" width="50"
            height="20" />
    @endif
@else
    <img src="{{ asset('adminBoard/uploadedImages/testimonials/' . $testimonial->photo) }}"
        class="img-fluid img-thumbnail table-image" width="50" height="20" />
@endif
