@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h1> {!! $page->title !!}</h1>
    <div class="twelvecol last pages">

        {!! $page->content !!}

        @if($page->filligrane)
            <div id="filligrane"><img src="{{ asset('images/filligrane.png') }}" alt="logo"></div>
        @endif

    </div>

</section>
@stop