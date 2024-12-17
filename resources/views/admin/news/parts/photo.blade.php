<img @if ($new->photo) src="{{ asset('adminBoard/uploadedImages/news/' . $new->photo) }}"
  @else
  src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    class="img-fluid img-thumbnail table-image " width="100" height="100" />
