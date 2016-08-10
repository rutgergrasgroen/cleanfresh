@extends('admin.layout')

@section('content')

    <div class="row">

        <div class="col-lg-12">

            <h1 class="page-header">Pagina's</h1>

            <a class="btn btn-primary" data-toggle="modal" data-target="#addPage">Nieuwe pagina toevoegen</a>

            <div id="addPage" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nieuwe pagina toevoegen</h4>
                    </div>
                    <form role="form" method="POST" action="{{ url('cfadmin/Pages') }}">
                        <div class="modal-body">
                            {!! csrf_field() !!}
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <label>Pagina titel</label>
                                <input class="form-control" name="title" type="text">
                            </div>       
                            <div class="form-group">
                                <label>Pagina template</label>
                                <input class="form-control" name="template" id="template" type="hidden">
                                <div class="templates">
                                    @foreach($templates as $template)
                                        {!! $template !!}
                                    @endforeach
                                </div>
                            </div>                   
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuleren</button>
                            <button type="submit" class="btn btn-success">Toevoegen</button>
                        </div>
                    </form>
                </div>

                </div>
            </div>

            <p>&nbsp;</p>

            <ol class="list-group sortable">

                @foreach($pages as $id => $page)

                    @include('admin.pages.partialPageLister', $page)

                @endforeach

                @if(count($pages) == 0)

                    <li>
                        <div>
                            Er zijn nog geen pagina's aangemaakt.
                        </div>
                    </li>

                @endif

            </ol>
            
        </div>
        
    </div>
    
@endsection
