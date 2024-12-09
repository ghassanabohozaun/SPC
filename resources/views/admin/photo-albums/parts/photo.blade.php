<img @if ($photoAlbum->main_photo) src="{{ asset('adminBoard/uploadedImages/albums/' . $photoAlbum->main_photo) }}"
@else
src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    width="100" height="80" class="img-fluid img-thumbnail table-image" />
