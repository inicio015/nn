@auth
    @if(count($article_read) > 0)
        <script nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
            $('#expandReadArticle').modal('show');
            
        </script>
        <!--********************************-->
        <!--****Funcion de modal global*****-->   
        <script type="text/javascript" src="{{  asset('js_files/views_functions/global/modals_read.js')  }}" ></script>
        <!--**************FIN***************-->
        
    @endif
    @if(!empty($banners_rand))
        <script type="text/javascript" nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
            $(function(){var a=document.querySelector(".banner-init"),b=a.naturalWidth,c=a.naturalHeight;215>=c&&0<c&&$(".banner-content").css({height:"auto"})});
        </script>
    @endif
    <script type="text/javascript" nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
        $( ".toggle_torrent" ).on( "click", function(event) {
            event.preventDefault();
            let toggle = $(this).attr('data-toggle');
            $(`#${toggle}`).fadeToggle();
        });
        
    </script>
    @if (Request::is('/'))
    <script type="text/javascript" nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
        $(function(){$(document).on("click",".show-poster",function(a){a.preventDefault();var b=$(this).attr("data-name"),c=$(this).attr("data-image");Swal.fire({showConfirmButton:!1,showCloseButton:!0,background:"rgb(35,35,35)",width:970,html:c,title:b,text:""})})});
    </script>
    @endif
@endauth