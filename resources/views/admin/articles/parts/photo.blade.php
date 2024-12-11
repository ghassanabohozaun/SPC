<img @if ($article->photo) src="{{ asset('adminBoard/uploadedImages/articles/' . $article->photo) }}"
  @else
  src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    class="img-fluid img-thumbnail table-image " width="100" height="100" />
