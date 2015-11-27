@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h1>News</h1>

    @if(!$news->isEmpty())
        @foreach($news as $item)
            <div class="onecol">
                <h2 class="news"></h2>
            </div>
            <div class="news elevencol last">
                <h2>{{ $item->titre }}</h2>
                <h5>{{ $item->dateNews->formatLocalized('%A %d %B %Y') }}</h5>
                <div>{!! $item->texte !!}</div>
            </div><hr/>
        @endforeach
    @endif

</section>
@stop