@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <h1>Pagina's</h1>
            <ul class="list-group">

                @foreach($pages as $id => $page)

                    <li class="list-group-item">{{ $page->title }} <a href="Pages/Delete/{{ $page->id }}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Zeker weten?"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a></li>

                @endforeach

            </ul>

        </div>
    </div>
</div>
@endsection
