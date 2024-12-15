<img @if ($publication->photo) src="{{ asset('adminBoard/uploadedImages/publications/' . $publication->photo) }}"
  @else
  src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    class="img-fluid img-thumbnail table-image " width="100" height="100" />
