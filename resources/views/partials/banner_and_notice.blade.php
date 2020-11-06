@auth
    @if(count($article_read) > 0)
        @include('partials.modals_read_article')
    @endif
@endauth
@if(!empty($banners_rand))
<div class="row">
    <div class="col-md-12 col-sm-12  col-banners">
        <div class="banner-content">
            @if(empty($banners_rand->link))


                <img src="{{ asset('storage/'.$banners_rand->image)}}" title="{{$banners_rand->title}}"  alt="{{$banners_rand->title}}" class="banner-init">
                
                </img>
                
            @else
                <a href="{{url($banners_rand->link)}}" title="{{$banners_rand->title}}" >

                    <img src="{{ asset('storage/'.$banners_rand->image)}}" alt="{{$banners_rand->title}}" class="banner-init">
                    
                    </img>
                </a>

            @endif
        </div>
    </div>
</div>
@endif