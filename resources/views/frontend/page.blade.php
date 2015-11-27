@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h2> {!! $page->title !!}</h2>
    <div class="twelvecol last pages">

        {!! $page->content !!}

        @if($page->filligrane)
            <div id="filligrane"><img src="{{ asset('images/filligrane.png') }}" alt="logo"></div>
        @endif

    </div>

</section>
@stop