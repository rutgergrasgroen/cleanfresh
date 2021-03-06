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
                <li class="active"><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/SEO">SEO (Google)</a></li>
                <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/Image">Gekoppelde afbeelding</a></li>
            </ul>

            <p>&nbsp;</p>

        </div>

        
        <form role="form" method="POST" action="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/SEO">
            {!! csrf_field() !!}
            {{ method_field('POST') }}
            <div class="col-lg-6">
                <h3>SEO</h3>
                <p>Vul hier uw zoekmachine instellingen in, als deze moeten afwijken van de standaard instellingen.</p>
                <div class="form-group">
                    <label>SEO Titel</label>
                    <input class="form-control" name="seo_title" type="text" value="{{ $page->seo_title }}">
                </div>
                <div class="form-group">
                    <label>SEO omschrijving</label>
                    <input class="form-control" name="seo_description" type="text" value="{{ $page->seo_description }}">
                </div> 

                <button class="btn btn-primary btn-lg" type="submit">Opslaan</button>
            </div>


        </form>
        
    </div>
    
@endsection
