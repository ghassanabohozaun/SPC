<a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('exteral_link').submit();">
    <form action="{{ route('site.external.link', [($link = 'site.external_link'), ($id = $test->id)]) }}" method="get"
        id="exteral_link" class="d-none">
        {{-- @csrf --}}
    </form>
    {!! $test->test_name !!}
</a>
