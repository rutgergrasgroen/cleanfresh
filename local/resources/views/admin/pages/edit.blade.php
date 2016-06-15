@extends('admin.layout')

@section('content')

    
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Pagina bewerken: {{ $page->title }}</h1>
        </div>

        <div class="col-lg-12">

            <ul class="nav nav-tabs">
                <li class="active"><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}">Algemeen</a></li>
                @if(!empty($page->template))
                    <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/Content">Inhoud</a></li>
                @endif
                <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/SEO">SEO (Google)</a></li>
                <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/Image">Gekoppelde afbeelding</a></li>
            </ul>

            <p>&nbsp;</p>

        </div>


        <form role="form" method="POST" action="{{ url('cfadmin/Pages/Edit', [$page->id]) }}">
            {!! csrf_field() !!}
            {{ method_field('POST') }}
            <div class="col-lg-6">
                <h3>Pagina instellingen</h3>
                <p>Wijzig hier uw pagina naam en stel eventueel een directe link in.</p>
                <div class="form-group">
                    <label>Pagina titel</label>
                    <input class="form-control" name="title" type="text" value="{{ $page->title }}">
                </div>
                <div class="form-group">
                    <label>Directe link</label>
                    <input class="form-control" name="link" type="text" value="{{ $page->link }}">
                </div>

                <button class="btn btn-primary btn-lg" type="submit">Opslaan</button>
            </div>

            <div class="col-lg-6">
                <div class="form-group">
                    <h3>Pagina template</h3>
                    <p>Als u een andere template kiest, houd er dan rekening mee dat de content van de pagina verloren kan gaan.</p>
                    <input class="form-control" name="template" id="template" type="hidden" value="{{ $page->template }}">
                    <div class="templates">
                        @foreach($templates as $template)
                            {!! $template !!}
                        @endforeach
                    </div>
                </div> 
            </div>

        </form>
        
    </div>
    
@endsection
