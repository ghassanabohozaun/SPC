<section class="red-color clients-section" style="background-color: #f65024">
    <div class="outer-container">
        <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
            @foreach($partners as $partner)
                <figure class="clients-logo-box">
                    <a href="#">
                        <img src="{{asset('adminBoard/uploadedImages/partners/'.$partner->photo)}}"
                        alt="{!! $partner->{'name_'.Lang()} !!}">
                    </a>
                </figure>
            @endforeach
        </div>
    </div>
</section>
