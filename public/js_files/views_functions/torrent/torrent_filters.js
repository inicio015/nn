datatables_torrents('torrents-full','full');
$('#myTabs a').click(function (e) {
    let id =  $(this).attr('href'), id_category= $(this).attr('data-id');
    let porciones = id.split("#");
    table_data = `torrents-${porciones[1]}`;
    types_tab_torrents = porciones[1];
    datatables_torrents(table_data,types_tab_torrents,id_category);
    e.preventDefault();
})
function datatables_torrents(table_data,types_tab_torrents,id_category){
    let columns = [
        {data: 'poster'},
        {data: 'category'},
        {data: 'name'},
        {data: 'age'},
        {data: 'size'},
        {data: 'seeds'},
        {data: 'leechs'},
        {data: 'completed'},
    ];
    if (!$.fn.DataTable.isDataTable(`.${table_data}`) ) {    
        $.extend( $.fn.dataTable.defaults, {
            autoWidth: false,
            dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
            language: {
                search: '<span></span> _INPUT_',
                searchPlaceholder: 'Buscar...',
                lengthMenu: '<span>Mostrar:</span> _MENU_',
                paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
            }
        });    
        var table = $(`.${table_data}`).DataTable({
            "processing": true,
            "serverSide": true,
            "serverMethod": 'post',
            "ajax":{'url':url, 
                    'beforeSend': function (request) {
                        $.ajaxsectionblock(`.${table_data}`);
                    },
                    "data":function (d) {
                        d._token = $('meta[name="csrf-token"]').attr('content');
                        d.type = types_tab_torrents;
                        d.id_category = id_category;
                    },
                    "dataSrc": function ( json ) {
                        //$('table.datatable').unblock();
                        $.ajaxsectionunblock();
                       
                        return json.data;
                    }  
                    
            } ,
            "ordering": false,
            "columns": columns,
            'createdRow': function( row, data, dataIndex ) {
                $(row).addClass('line_torrents');
            },
            "language": {
                "info": "Pagina _PAGE_ de _PAGES_",
            },
        })


       /* .on("draw", function(){
            $('.torrentBookmark').each(function() {
                var active = $(this).attr("state") ? $(this).attr("state") : 0;
                var id = $(this).attr("id") ? $(this).attr("id") : 0;
                var custom = $(this).attr("custom") ? $(this).attr("custom") : '';
                $(this).off('click');
                if(active == 1) {
                    $(this).attr("data-original-title","Unbookmark Torrent");
                } else {
                    $(this).attr("data-original-title","Bookmark Torrent");
                }
                $(this).html('<button custom="'+custom+'" state="'+active+'" torrent="'+id+'" class="btn ' + (active > 0 ? 'btn-circle btn-danger' : 'btn-circle btn-primary') + '"><i class="'+this.font+' fal fa-bookmark"></i></button>');
                $(this).on('click', function() {
                    torrentBookmark.handle($(this).attr("torrent"),$(this).attr("state"),$(this).attr("custom"));
                });
            });
        });*/
    }
}
