@if(!$lastArticles->isEmpty())
    <section class="news-section sec-pad">
        <div class="auto-container">
            <div class="sec-title centred">
                <span class="top-text">{!! __('index.blog_and_article') !!}</span>
                <h2>{!! fixedTexts()->{'blog_title_'.Lang()} !!}</h2>
            </div>
            <div class="row clearfix">

                @forelse($lastArticles as $lastArticle)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                        <div class="news-block-one wow fadeInUp animated animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms">
                            <div class="inner-box">
                                <figure class="image-box">
                                    <a href="#">
                                        <img src="{{asset('adminBoard/uploadedImages/articles/'.$lastArticle->photo)}}"
                                             alt="{!! $lastArticle->{'title_'.Lang()}!!}">
                                    </a>
                                </figure>
                                <div class="content-box">
                                    <div class="text my-word-break">
                                        <span class="post-date">{!! $lastArticle->publish_date !!}</span>
                                        <div class="category"><a
                                                href="{!! route('news') !!}"># {!! __('index.articles') !!}</a></div>
                                        <h3>
                                            <a href="{!! route('new-details',slug($lastArticle->{'title_'.Lang()}) ) !!}">{!! $lastArticle->{'title_'.Lang()} !!}</a>
                                        </h3>
                                        <p>
                                            {!! \Illuminate\Support\Str::limit(strip_tags($lastArticle->{'abstract_'.Lang()}),$limit = 50, $end = ' ...')!!}
                                        </p>
                                    </div>
                                    <div class="info clearfix">
                                        <div class="link-box {!! Lang()=='ar' ? 'pull-right' : 'pull-left' !!}">
                                            <a href="{!! route('new-details',slug($lastArticle->{'title_'.Lang()}) ) !!}">{!! __('index.more_details') !!}</a>
                                        </div>
                                        <div class="comment-box {!! Lang()=='ar' ? 'pull-left' : 'pull-right' !!}">
                                            <a href="javascript:void(0)">
                                                <i class="far fa-comment"></i>
                                                {{-- {!! \App\Models\Comment::where('status','on')->where('post_id',$lastArticle->id)->count() !!} --}}
                                                {{$lastArticle->comments()->count()}}
                                                {!! __('index.comments') !!}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse

            </div>
        </div>
    </section>
@endif
