<?php
    $article_read = (isset($article_read_json)) ? $article_read_json : $article_read ;
?>
@foreach($article_read as $a)
    <div class="content-articles" >         
        <ul class="list-group"> 
            <li class="list-group-item item_article{{$a->id}} group_list_article">
                <div class="row">
                    <div class="col-sm-6 col-md-8 col-lg-8" >
                        <h4 style="" class="title_article_read"><a href="#">{{$a->title}}</a></h4>
                        <p class="text-muted small published_read">Published On {{ $a->created_at->toDayDateTimeString() }}</p>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-4 text-right">
                        <span class="label label-danger">IMPORTANT</span>
                    </div>
                </div>
                <hr style="margin-bottom:0px;">
                <div class="row">
                    <div class="col-lg-3 ">
                        @if ( ! is_null($a->image))
                            <img src="{{ url('files/img/' . $a->image) }}" class="img_article_read" alt="{{ $a->title }}">
                        @else
                            <img src="{{ url('img/missing-image.png') }}" class="img_article_read" alt="{{ $a->title }}">
                        @endif
                    </div>
                    <div class="col-lg-9">
                        <p>@emojione($a->getContentHtml())</p>
                    </div>
                    
                </div>
                <hr>

                <div class="row">
                    <div class="col-lg-6">
                    <a href="{{ route('articles.show', ['id' => $a->id]) }}" class="btn btn-primary btn-sm">Read Article</a>
                    </div>
                    <div class="col-lg-6 text-right">
                    <b>Read:</b> <input type="checkbox" data-id="{{$a->id}}" data-url="{{ route('read_article') }}" class="read_check" value="1">
                    </div>
                </div>
            </li>
        </ul>
    </div>
@endforeach
{{$article_read->onEachSide(1)->links('vendor.pagination.bootstrap_jquery') }}