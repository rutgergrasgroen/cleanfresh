<li class="list-item" id="page_{{ $page['id'] }}">

    <div>
        <span class="fa fa-arrows text-muted padding-right handle"></span>

        <a class="btn btn-outline btn-default" disabled>
            <span class="fa fa-file-text-o" aria-hidden="true"></span> 
        </a>

        <strong class="padding"> 
            {{ $page['title'] }}
        </strong>

        <div class="pull-right">
            <a href="{{ url($page['slug']) }}" class="btn btn-outline btn-default margin-left">
                <span class="fa fa-link text-muted" aria-hidden="true"></span>
            </a> 
            <a href="Pages/Status/{{ $page['id'] }}" class="btn btn-outline btn-info margin-left">
                <span class="fa fa-eye" aria-hidden="true"></span>
            </a> 
            <a href="Pages/Edit/{{ $page['id'] }}" class="btn btn-outline btn-warning margin-left">
                <span class="fa fa-edit" aria-hidden="true"></span>
            </a>
            <a href="Pages/Delete/{{ $page['id'] }}" class="btn btn-outline btn-danger margin-left" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Zeker weten?">
                <span class="fa fa-trash" aria-hidden="true"></span>
            </a>
        </div>
    </div>

    @if(count($page['children']) > 0)

        <ol>

            @foreach($page['children'] as $page)
                @include('admin.pages.partialPage', $page)
            @endforeach

        </ol>
        
    @endif

</li>