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
                    <li class="active"><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/Content">Inhoud</a></li>
                @endif
                <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/SEO">SEO (Google)</a></li>
                <li><a href="{{ url('cfadmin/Pages/Edit', [$page->id]) }}/Image">Gekoppelde afbeelding</a></li>
            </ul>

            <p>&nbsp;</p>

        </div>

        
        @if($blockid > 0)

            <div class="col-lg-10">
                <form role="form" method="POST" action="{{ url('cfadmin/Pages/Edit/' . $page->id . '/Content/' . $blockid) }}">
                    {!! csrf_field() !!}
                    {{ method_field('POST') }}
                    <textarea name="block_content" id="editor1" rows="10" cols="80">
                        @if(!empty($blocks[$blockid]))
                            {{ $blocks[$blockid] }}
                        @endif
                    </textarea>

                    <script src="{{ asset('/local/public/vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
                    <script>
                        CKEDITOR.replace( 'block_content' );
                    </script>

                    <p>&nbsp;</p>

                    <button class="btn btn-primary btn-lg" type="submit">Opslaan</button>
                </form>
            </div>

            <div class="col-lg-2 templates edit small">
                {!! $template !!}
            </div>

        @else

            <div class="col-lg-12 templates edit">
                {!! $template !!}
            </div>

        @endif
        
    </div>
    
@endsection
