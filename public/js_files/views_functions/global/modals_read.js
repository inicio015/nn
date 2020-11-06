// Funciones para  el modal de articulos importantes
$(function() {
    //Funcion click para leer un articulo
    $(document).on("click",".read_check",function(event){
        if($(this).prop("checked")){
          let url =   $(this).data('url'),count_article = $('.count_articles_read').html();
          let id = $(this).data('id');
          $.ajaxsectionblock(`.item_article${id}`);
          axios.post(url, {
            'id':id
          })
          .then(function (response) {
            if(response.status == 200){
                $(`.item_article${id}`).fadeOut(200);
                $(`.count_articles_read`).html(count_article-1);
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Read article',
                    showConfirmButton: false,
                    timer: 1700
                })
            }
          })
          .catch(function (error) {
            console.log(error);
            alert(error);
          });
        }
    });
    //Funcion click para ir a la siguiente pagina 
    $(document).on("click",".jquery_link",function(event){
        $.ajaxsectionblock(`.modal-body`);
        let url_page = $(this).attr('href'),url_next = $(this).data('url'); 
        let url_renew = url_page.split('?');
        let url_submit = `${url_next}?${url_renew[1]}`;
        $('li').removeClass('active'); $(this).parent('li').addClass('active');
        axios.get(url_submit)
        .then(function (response) {
            if(response.status == 200){
                $.ajaxsectionunblock(`.modal-body`);
                $('.resp_ajax_read_modal').html(response.data);
                $('.count_articles_read').html($( ".content-articles" ).length);
            }
        })
        event.preventDefault();
    });
});