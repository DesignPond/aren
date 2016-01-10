@extends('frontend.layouts.master')
@section('content')

<div class="sevencol">
    <h1>Bienvenue sur le site de l’aren</h1>

    <h2> {!! $page->title !!}</h2>
    {!! $page->content !!}

    <p class="infoLien"><a href="{{ url('page/presentation') }}"><span></span>En savoir plus</a></p>
</div>
<div class="fivecol last polaroids">

    @include('frontend.partials.illustration')

</div>

<hr/>

<p class="spacer"></p>

    <div class="sevencol">

        <h3>Découvrez nos activités</h3>

        @if(!$blocs->isEmpty())
            <?php $i = 1; ?>
            @foreach($blocs as $bloc)
                <article class="activites {{ $i%2 == 0 ? 'last' : '' }}">
                    <div class="icon"><img src="{{ asset('frontend/images/icons/'.$bloc->type) }}.png" alt="{{ $bloc->titre }}" /></div>
                    <h4>{{ $bloc->titre }}</h4>
                    {!! $bloc->contenu !!}
                </article>
                {!! $i%2 == 0 ? '<hr/>' : '' !!}

                <?php $i++; ?>
            @endforeach
        @endif

    </div>
    <div class="fivecol last">

        <h3>Découvrez un nouveau prestataire</h3>
        <p class="location"><strong>{{ $participant->barn_title }}</strong></p>

        <div class="map-wrapper">
            <div id="map_canvas_main" style="height: 230px;"></div>
        </div>

        <script>
            var canvas     = document.getElementById('map_canvas_main');
            var latlng     = new google.maps.LatLng(<?php echo $participant->map->latitude; ?> ,<?php echo $participant->map->longitude; ?>);
            var mapOptions = {zoom : 14, center: latlng};
            var map        = new google.maps.Map(canvas, mapOptions);
        </script>

        @include('frontend.partials.carte')

    </div>
    <hr/>

@stop