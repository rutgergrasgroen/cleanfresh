@extends('admin.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <h1 class="page-header">Mediamap: {{ $folder->name }}</h1>

            <span class="btn btn-success fileinput-button">
		        <i class="glyphicon glyphicon-plus"></i>
		        <span>Bestanden uploaden</span>
		        <!-- The file input field used as target for the file upload widget -->
		        <input id="fileupload" type="file" name="files[]" multiple>
		    </span>
		    <br>
		    <br>
		    <!-- The global progress bar -->
		    <div id="progress" class="progress">
		        <div class="progress-bar progress-bar-success"></div>
		    </div>
		    <!-- The container for the uploaded files -->
		    <div id="files" class="files"></div>

            <p>&nbsp;</p>

            <ol class="list-group sortable">

                @foreach($media as $id => $item)

                    <li class="list-item nohandle" id="folder_{{ $item['id'] }}" data-id="{{ $item['id'] }}" data-type="Media">

                        <div>

                            <img class="thumb" src="{{ url('local/public/'. $item->getUrl()) }}" />

                            <strong class="padding"> 
                                {{ $item['name'] }}
                            </strong>

                            <div class="pull-right">

                                <a href="Media/{{ $item['id'] }}" class="btn btn-outline btn-warning margin-left">
                                    <span class="fa fa-edit" aria-hidden="true"></span>
                                </a>

                                <a class="btn btn-outline btn-danger margin-left delete">
                                    <span class="fa fa-trash" aria-hidden="true"></span>
                                </a>
                                
                            </div>

                        </div>

                    </li>

                @endforeach

                @if(count($media) == 0)

                    <li>
                        <div>
                            Er zijn nog geen mediaitems geupload.
                        </div>
                    </li>

                @endif

            </ol>

        </div>
        <!-- /.col-lg-12 -->
    </div>

    <meta name="_folderid" content="{{ $folder->id }}" />
    
@endsection
