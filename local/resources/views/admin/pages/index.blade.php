@extends('admin.layout')

@section('content')

    <div class="row">

        <div class="col-lg-12">

            <h1 class="page-header">Pagina's</h1>

            <ul class="list-group">

                @foreach($pages as $id => $page)

                    <li class="list-group-item">

                        <span class="fa fa-arrows text-muted padding-right"></span>

                        <a href="Pages/Status/{{ $page->id }}" class="btn btn-outline btn-default" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Zeker weten?">
                            <span class="fa fa-file-text-o" aria-hidden="true"></span> 
                        </a>

                        <strong class="padding"> 
                            {{ $page->title }}
                        </strong>

                        <div class="pull-right">
                            <a href="Pages/Status/{{ $page->id }}" class="btn btn-outline btn-info margin-left" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Zeker weten?">
                                <span class="fa fa-eye" aria-hidden="true"></span>
                            </a> 
                            <a href="Pages/Edit/{{ $page->id }}" class="btn btn-outline btn-warning margin-left" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Zeker weten?">
                                <span class="fa fa-edit" aria-hidden="true"></span>
                            </a>
                            <a href="Pages/Delete/{{ $page->id }}" class="btn btn-outline btn-danger margin-left" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Zeker weten?">
                                <span class="fa fa-trash" aria-hidden="true"></span>
                            </a>
                        </div>

                    </li>

                @endforeach

            </ul>
            
        </div>
        
    </div>
    
@endsection
