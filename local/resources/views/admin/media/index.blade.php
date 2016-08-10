@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">Media</h1>

            <a class="btn btn-primary" data-toggle="modal" data-target="#addMediaMap">Nieuwe mediamap toevoegen</a>

            <div id="addMediaMap" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Nieuwe mediamap toevoegen</h4>
                    </div>
                    <form role="form" method="POST" action="{{ url('cfadmin/Media') }}">
                        <div class="modal-body">
                            {!! csrf_field() !!}
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <label>Naam</label>
                                <input class="form-control" name="name" type="text">
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

                @foreach($folders as $id => $folder)

                    <li class="list-item" id="folder_{{ $folder['id'] }}" data-id="{{ $folder['id'] }}">

                        <div>

                            <a class="btn btn-outline btn-default icon disclose" disabled>
                                <span class="fa fa-file-text-o text-muted" aria-hidden="true"></span> 
                            </a>

                            <strong class="padding"> 
                                {{ $folder['name'] }}
                            </strong>

                            <div class="pull-right">

                                <a href="Media/Edit/{{ $folder['id'] }}" class="btn btn-outline btn-warning margin-left">
                                    <span class="fa fa-edit" aria-hidden="true"></span>
                                </a>

                                <a class="btn btn-outline btn-danger margin-left delete">
                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                </a>
                                
                            </div>

                        </div>

                    </li>

                @endforeach

                @if(count($folders) == 0)

                    <li>
                        <div>
                            Er zijn nog geen folders aangemaakt.
                        </div>
                    </li>

                @endif

            </ol>

        </div>
        <!-- /.col-lg-12 -->
    </div>
    
@endsection
