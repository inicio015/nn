@switch($option)
    @case('buttons')
        <a href="{{ route('staff.banners.edit', ['id' => $id]) }}"  class="btn btn-info">Edit</a>
        
        <a href="#" data-url="{{ route('staff.banners.destroy', ['id' => $id]) }}" data-id="{{$id}}" class="btn btn-danger delete_item">Delete</a>

        
        @break

    @case('enabled')
            @if($data == 1)
                <a href="#"  data-id="{{$id}}" data-url="{{ route('staff.banners.update', ['id' => $id]) }}"  style="padding:7px;" class="badge badge-success sslist{{$id}} enabled_banner">Active</a>
            @else
                <a href="#"  data-id="{{$id}}" data-url="{{ route('staff.banners.update', ['id' => $id]) }}"  style="padding:7px;" class="badge badge-danger sslist{{$id}} enabled_banner">Inactive</a>

            @endif
        @break
    @case('img')
            @if(!empty($data))
                <a href="#" class="img_banner_expand" ><img src="{{ asset('storage/'.$data) }}"  class="img-thumbnail" alt="nothing" style="height: 60px;width: 100px;"></a>
            @endif
        @break

    @default
        Default case...
@endswitch