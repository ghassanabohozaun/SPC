<img @if ($test->test_photo) src="{{ asset('adminBoard/uploadedImages/tests/' . $test->test_photo) }}"
    @else
    src="{{ asset('adminBoard/images/images-empty.png') }}" @endif
    width="100" height="80" class="img-fluid img-thumbnail table-image" />
