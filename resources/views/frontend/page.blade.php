@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h1> {!! $page->title !!}</h1>
    <div class="twelvecol last pages">

        <div class="content-page">
            {!! $page->content !!}
        </div>

        @if($page->filligrane)
            <div id="filligrane"><img src="{{ asset('frontend/images/filligrane.png') }}" alt="logo"></div>
        @endif

    </div>

</section>
@stop