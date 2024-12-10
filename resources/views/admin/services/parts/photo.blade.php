<img @if ($service->photo) src="{{ asset('adminBoard/uploadedImages/services/' . $service->photo) }}"
    @else
    src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    width="100" height="80" class="img-fluid img-thumbnail table-image" />
