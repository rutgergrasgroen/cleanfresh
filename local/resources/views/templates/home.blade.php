@extends('layouts.site')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            {{ (isset($blocks[1]) ? $blocks[1] : "") }}<!--{cf_block_1}50,100{/cf_block_1}-->
            {{ (isset($blocks[2]) ? $blocks[2] : "") }}<!--{cf_block_2}50,100{/cf_block_2}-->
            
        </div>
    </div>
</div>
@endsection
