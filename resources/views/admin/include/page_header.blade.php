<div class="page-header">
    <div class="page-title">
        <h4>{{$header_name}}</h4>
        <h6>{{$title}}</h6>
    </div>
    <div class="page-btn">
        <a href="{{route($route)}}" class="btn btn-added"><img
                src="{{addIconSVG()}}"
                alt="img">{{$button_name ? $button_name : 'Add'}}</a>
    </div>
</div>
