<li class="list-item" id="page_{{ $page['id'] }}" data-id="{{ $page['id'] }}">

    <div>
        <span class="fa fa-arrows text-muted padding-right handle"></span>

        
        @if(count($page['children']) > 0)
            <a class="btn btn-outline btn-default icon disclose">
                <span class="fa fa-folder text-muted" aria-hidden="true"></span> 
        @else
            <a class="btn btn-outline btn-default icon disclose" disabled>
                <span class="fa fa-file-text-o text-muted" aria-hidden="true"></span> 
        @endif
        </a>

        <strong class="padding"> 
            {{ $page['title'] }}
        </strong>

        <div class="pull-right">

            <a href="{{ url($page['slug']) }}" class="btn btn-outline btn-default margin-left">
                <span class="fa fa-link text-muted" aria-hidden="true"></span>
            </a> 

            @if($page['status'] == 0)
                <a class="btn btn-outline btn-default margin-left status">
            @else
                <a class="btn btn-outline btn-info margin-left status">
            @endif
                <span class="fa fa-eye" aria-hidden="true"></span>
            </a> 

            <a href="Pages/Edit/{{ $page['id'] }}" class="btn btn-outline btn-warning margin-left">
                <span class="fa fa-edit" aria-hidden="true"></span>
            </a>

            <a class="btn btn-outline btn-danger margin-left delete">
                <span class="fa fa-trash" aria-hidden="true"></span>
            </a>
            
        </div>
    </div>

    @if(count($page['children']) > 0)

        <ol>

            @foreach($page['children'] as $page)
                @include('admin.pages.partialPageLister', $page)
            @endforeach

        </ol>
        
    @endif

</li>