@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h1>Carte</h1>

    <div id="carteLegend">
        @if(!$cartes->isEmpty())
            <?php $rows = $cartes->whereLoose('type','troncon')->chunk(4); ?>
            @foreach($rows as $row)
                <div class="row">
                    <?php $end = count($row); $i = 1; ?>
                    @foreach($row as $col)
                        <div class="threecol {{ $end == $i ? 'last' : '' }}">
                            <p class="legende legendeIcon"><i style="background: {{ $col->color_hex }};"></i>{{ $col->name }}</p>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            @endforeach
        @endif

        @if(!$icons->isEmpty())
            <?php $icons = $icons->chunk(4); ?>
            @foreach($icons as $row)
                <div class="row">
                    <?php $end = count($row); $i = 1; ?>
                    @foreach($row as $icon)
                        <div class="threecol {{ $end == $i ? 'last' : '' }}">
                            <p class="legende legendeIcon"><img alt="icon" src="{{ asset('frontend/icons/'.$icon->image) }}">{{ $icon->titre }}</p>
                        </div>
                        <?php $i++; ?>
                    @endforeach
                </div>
            @endforeach
        @endif
    </div>

    <br/>

    <div class="map-wrapper">
        <div id="map_canvas_main" style="height: 500px;"></div>
    </div>

    <script>
        var canvas     = document.getElementById('map_canvas_main');
        var latlng     = new google.maps.LatLng(47.012724, 6.731005);
        var mapOptions = {zoom : 10, center: latlng};
        var map        = new google.maps.Map(canvas, mapOptions);
    </script>

    @include('frontend.partials.carte', ['height' => 500])

</section>
@stop