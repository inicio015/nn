$(function() {
    //Add options selected
    $(document).on("change",".select_type_torrent",function(event){
        let id_selected = $(this).find(':selected').attr('data-id');
        if ( $(`#item_selected_js${id_selected}`).length == 0 && $(this).val().length > 0) {
            $('.result_type_selected').append(`
            <div class="json_element_types" id="item_selected_js${id_selected}"><span class="json_element_item" data-id="${id_selected}">${$(this).val()}</span>
                <a href="#" class="delete_item_select" data-type="js" data-id="${id_selected}"><i class="fas fa-times-circle"></i></a>
            </div>`);
        }
        return_js_input();
    });
    //Deleted options selected
    $(document).on("click",".delete_item_select",function(event){
        let id = $(this).data('id');
        if($(this).attr('data-type') == 'php'){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    axios.delete($(this).data('url'))
                    .then(function (response) {
                        if(response.status == 200){
                            $(`#item_selected_js${id}`).remove();
                            Swal.fire(
                                'Deleted!',
                                'Your item has been deleted.',
                                'success'
                            )
                        }
                    }).catch(function (error) {
                        console.log(error);
                        alert(error);
                    });
                }
            })
        }else{
            $(`#item_selected_js${id}`).remove();
        }
        return_js_input();
        event.preventDefault();
    });
    //Created json input 
    function return_js_input() {
        let datos  = [];
        if($('.json_element_item').length > 0){
            $(".json_element_item").each(function(){                
                datos.push({ 
                        "id":$(this).data('id'),
                        "type" : $(this).html(),
                    });
                });
            $('#torrens_selecteds').val(JSON.stringify(datos));
        }else{
            $('#torrens_selecteds').val('');
        }

    }
});