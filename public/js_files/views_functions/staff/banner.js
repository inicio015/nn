if(document.querySelector('#form-file')){
  const form = document.querySelector('#form-file');
  form.addEventListener('submit', function(event) {
    // preventDefault in a regular function
    event.preventDefault()

    // call async helper function
    submitFile(event.target)
  })
}
async function submitFile(i) {	
  $.ajaxblock('form');
  let form = document.getElementById($(i).attr('id')),  formData = new FormData(form);
  try {
    const response = await axios.post($(i).attr("action"),formData,
        {
          headers: {
              'Content-Type': 'multipart/form-data'
          }
        }
      );
      let json = response.data;
      $.ajaxunblock();
      if(jQuery.isEmptyObject(json.error)){
        
        if (!jQuery.isEmptyObject(json.url)) {
          location.href=json.url;
        }
      }else{
        $('.response-data').html('');
        $.each( json.error, function( key, value ) {
            $('.response-data').removeClass('alert alert-success').addClass('alert alert-danger').append(`<p>* ${value}</p>`).show(500);
        });
        $('html, body').animate({scrollTop:0}, 'slow'); 
      }
  } catch (error) {
    $.ajaxunblock();
    $('.response-data').html('');
    $('.response-data').addClass('alert alert-danger').append(`<p>*${error} || Internal server error </p>`);
    $('html, body').animate({scrollTop:0}, 'slow'); 
  }
}	

  //# JQUERY
$(document).on("click",".enabled_banner",function(e){
    let idbanner = $(this).data('id'),url = $(this).data('url');
    let datos = {
      id:idbanner,
      action:'status',
      _token:$('meta[name="csrf-token"]').attr('content')
    };
    $.ajax({
        type:'POST',
        url: url,
        dataType: "json",
        data:datos,
       beforeSend:function(){
 
       },
        success: function(data)
        {
            if(jQuery.isEmptyObject(data.error)){
                if(data.tipe == 1){
                  $(`.sslist${idbanner}`).removeClass('badge-danger').addClass('badge-success').html('Active');
                }else{
                  $(`.sslist${idbanner}`).removeClass('badge-success').addClass('badge-danger').html('Inactive');
                }
            }
         
        }
     });
    e.preventDefault()
});
$(document).on("click",".img_banner_expand",function(e){
  let src_banner = $(this).find('img').attr('src');
  $('.expand_img_table').attr('src',src_banner);
  $('#expandImg').modal('show');
  e.preventDefault();
});
$(document).on("click",".delete_item",function(e){
  const form_data = {_token:$('meta[name="csrf-token"]').attr('content')};
  const id = $(this).data('id');
  Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.value) {
      $.ajax({
           type:'DELETE',
           url:$(this).data('url'),
           dataType: "json",
           data:form_data,
           success:function(data){
              if(jQuery.isEmptyObject(data.error)){
                $('#codenv'+id).hide(200).remove();
                Swal.fire({title:"Registro eliminado con exito...",icon:"success"});
              }else{
                alert(data);
              }
            },
            error: function(jqXHR, textStatus, errorThrown) 
            { 
              
            }
      });
    }
  });
  e.preventDefault();
});
$(document).on("change","#check_link_box",function(e){  
  if($(this).prop("checked")){
    $('.link_input').removeAttr('disabled');
  }else{
    $('.link_input').attr('disabled','disabled');
  }
});