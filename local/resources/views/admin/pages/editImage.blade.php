@extends('admin.layout')

@section('content')

    <div class="row">
    
        <div class="col-lg-12">
            <h1 class="page-header">Pagina bewerken: {{ $page->title }}</h1>
        </div>

        <div class="col-lg-12">

            <ul class="nav nav-tabs">
                <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}">Algemeen</a></li>
                @if(!empty($page->template))
                    <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/Content">Inhoud</a></li>
                @endif
                <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/SEO">SEO (Google)</a></li>
                <li class="active"><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/Image">Gekoppelde afbeelding</a></li>
            </ul>

            <p>&nbsp;</p>

        </div>

        <div class="col-lg-12">
            Plaatje koppelen
        </div>

        </div>
        
    </div>

@endsection
