<img @if ($slider->photo) src="{{ asset('adminBoard/uploadedImages/sliders/' . $slider->photo) }}"
@else  src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    width="100" height="80" class="img-fluid img-thumbnail table-image " />
