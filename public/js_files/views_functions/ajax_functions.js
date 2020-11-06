(function ($) {
    $.ajaxblock = function(selector){
        $(selector).append(`
        <div class="loading show loading-ajaxs">
            <div class="spin"></div>
        </div>`
        );
    }
    $.ajaxunblock = function(){
        $('.loading-ajaxs').fadeOut();
        $('.loading-ajaxs').remove();
    }
    $.ajaxsectionblock = function(selector){
        $(selector).append(`<div class="blockUI blockOverlay" style="  display: flex;justify-content: center;align-items: center;z-index: 1000; border: medium none; margin: 0px; padding: 0px; width: 100%; height: 100%; top: 0px; left: 0px; background-color: rgb(255, 255, 255); opacity: 0.8; cursor: wait; box-shadow: rgb(221, 221, 221) 0px 0px 0px 1px; position: absolute;"><div class="loading-contenido" >Cargando.....
        </div></div>`);
    }
    $.ajaxsectionunblock = function(){
        $('.blockUI').remove();
    }
})(jQuery);
