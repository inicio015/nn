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
    <li>
        <a href="{{ route('staff.banners.index') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">Banners</span>
        </a>
    </li>
    <li class="active">
        <a href="{{ route('staff.banners.create') }}" itemprop="url" class="l-breadcrumb-item-link">
            <span itemprop="title" class="l-breadcrumb-item-link-title">Add banner</span>
        </a>
    </li>
@endsection

@section('content')
    <div class="container box">
        <div class="ajax-loader"></div>
        <h2>Banners</h2>
        <div class="response-data"></div>
        <form  action="{{ route('staff.banners.store') }}" method="POST" id="form-file" onsubmit="envi(this); return false" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="action" value="add">
            <div class="row">
                <div class="col-sm-6 col-md-9 col-lg-9">
                    <label for="title">Title</label>
                    <label>
                        <input type="text" class="form-control" name="title" >
                    </label>
                </div>
                <div class="col-sm-6 col-md-2 col-lg-2 text-center">
                    <label for="enlacee">Check Status:</label>
                    <b>Enabled :</b> <input type="checkbox" name="enabled" id="check_enabled_box" value="1" >
                </div>
            </div>
            <br/>
            <div class="form-group">
                <label for="content">The content of your banner</label>
                <textarea name="description" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4">
                <label for="priority">Imagen del banner:</label>
                <input id="input-b1" name="image" type="file" class="file" data-browse-on-zone-click="true">
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 ">
                <label for="priority">Prioridad:</label>
                
                <input type="number" name="priority" class="form-control" required="">
            </div>
            <div class="col-sm-6 col-md-2 col-lg-2 text-center">
                <label for="enlacee">Check enlace:</label>
                <b>Habilitar:</b> <input type="checkbox"  id="check_link_box"  >
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3">
                <label for="priority">Enlace:</label>
                <input type="text" name="link" disabled class="form-control link_input" >
            </div>
            <div class="col-xs-12 text-center"  style="margin-top:4px;">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

@endsection
@section('scripts')
    <script nonce="{{ Bepsvpt\SecureHeaders\SecureHeaders::nonce() }}">
        $('#content').wysibb({});
        emoji.textcomplete()
    </script>
    <script type="text/javascript" src="{{  asset('js_files/views_functions/staff/banner.js')  }}" ></script>
@endsection

