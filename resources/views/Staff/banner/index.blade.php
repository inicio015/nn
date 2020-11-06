@extends('layout.default')

@section('title')
    <title>Banners - @lang('staff.banner-dashboard') - {{ config('other.title') }}</title>
@endsection

@section('breadcrumb')
    <li>
        <a href="{{ route('staff.dashboard.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">@lang('staff.banner-dashboard')</span>
        </a>
    </li>
    <li class="active">
        <a href="{{ route('staff.banners.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">Banners</span>
        </a>
    </li>
@endsection

@section('content')
    @if (session('create'))
        <div class="alert alert-success torrent-message-success">
            {{ session('create') }}
        </div>
    @endif

    <div class="container box">

        <h2>Banners</h2>
        
        <a href="{{ route('staff.banners.create') }}" class="btn btn-primary">Add An Banner</a>
        <div class="table-responsive">
            <table class="table table-condensed table-striped table-bordered table-hover datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Img</th>
                        <th>Priority</th>
                        <th>link</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- Modal para mostrar imagenes de la tabla -->
    <div id="expandImg" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Imagen</h4>
                </div>
                <div class="modal-body">
                    <div class="col-xs-12">
                        <img src="" class="expand_img_table" style="width:100%;" >
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
        const url = "{{ route('staff.banners.datatable') }}";
        const columns = [
		        {data: 'title'},
		        {data: 'image'},
		        {data: 'priority'},
		        {data: 'link'},
                {data: 'status'},
                {data: 'created_at'},
		        {data: 'action'},
		    ];
    </script>
    <script type="text/javascript" src="{{  asset('js_files/plugins/datatable_init.min.js')  }}" ></script>
    <script type="text/javascript" src="{{  asset('js_files/views_functions/staff/banner.js')  }}" ></script>
@endsection

