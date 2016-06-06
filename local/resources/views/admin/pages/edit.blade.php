@extends('admin.layout')

@section('content')

    
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Pagina bewerken: {{ $page->title }}</h1>
        </div>

        <div class="col-lg-12">

            <ul class="nav nav-tabs">
                <li class="active"><a href="{{ url('admin/Pages/Edit', [$page->id]) }}">Algemeen</a></li>
                <li><a href="{{ url('admin/Pages/Edit', [$page->id]) }}/Content">Inhoud</a></li>
                <li><a href="{{ url('admin/Pages/Edit', [$page->id]) }}/Image">Gekoppelde afbeelding</a></li>
            </ul>

            <p>&nbsp;</p>

        </div>


        <form role="form" method="POST" action="{{ url('admin/Pages/Edit', [$page->id]) }}">
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
            </div>

        </form>
        
    </div>
    
@endsection
