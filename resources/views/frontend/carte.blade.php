@extends('frontend.layouts.master')
@section('content')

<section class="contenu">

    <h1>Carte</h1>

    <table cellpadding="0" width="100%" cellspacing="0" border="0" style="border:none;">
        @if(!$cartes->isEmpty())
            <?php $rows = $cartes->whereLoose('type','troncon')->chunk(4); ?>
            @foreach($rows as $row)
                <tr>
                    @foreach($row as $col)
                        <td width="25%">
                            <p class="legende legendeIcon"><i style="background: {{ $col->color_hex }};"></i>{{ $col->name }}</p>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @endif

        @if(!$icons->isEmpty())
            <?php $icons = $icons->chunk(4); ?>
            @foreach($icons as $row)
                <tr>
                    @foreach($row as $icon)
                        <td width="25%">
                            <p class="legende legendeIcon"><img alt="icon" src="{{ asset('frontend/icons/'.$icon->image) }}">{{ $icon->titre }}</p>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @endif
    </table>

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