<!-- Modal para mostrar articulos -->
<div id="expandReadArticle" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Unread articles - <span class="label label-danger count_articles_read">{{ count($article_read)}}</span></h4>
            </div>
            <div class="modal-body resp_ajax_read_modal">
                @include('article.article_list_read')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>