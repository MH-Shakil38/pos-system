<div class="page-header">
    <div class="page-title">
        <h4>{{$header_name ? $header_name : ''}}</h4>
        <h6>{{ $title ? $title : ''}}</h6>
    </div>
    @if(isset($button_name))
    <div class="page-btn">
        <a href="{{route($route)}}" class="btn btn-added"><img
                src="{{addIconSVG()}}"
                alt="img">{{$button_name}}</a>
    </div>
    @endif
</div>
