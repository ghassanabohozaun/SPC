<h6>{!! trans('index.blog') !!}</h6>
<div class="widget-content">
    <ul class="menu vertical">
        <li>
            <a href="{!! route('articles') !!}">
                {!! __('index.articles') !!}
            </a>
            <hr>
            <a href="{!! route('books') !!}">
                {!! __('index.books') !!}
            </a>
            <hr>
            <a href="{!! route('posters') !!}">
                {!! __('index.posters') !!}
            </a>
            <hr>
            <a href="{!! route('news') !!}">
                {!! __('index.news') !!}
            </a>
        </li>
    </ul>
</div>
