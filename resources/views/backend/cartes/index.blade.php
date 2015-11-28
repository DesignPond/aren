@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/bloc/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;Tronçons</h4>
            </div>
            <div class="panel-body">


            @if(!$troncons->isEmpty())
                @foreach($troncons as $troncon)

                    <div class="map-wrapper map-small">
                        <div id="map_canvas_{{ $troncon->id }}" style="height: 350px;"></div>
                    </div>

                    <script>
                        $( function() {
                            var id     = 'map_canvas_<?php echo $troncon->id; ?>';
                            var canvas = document.getElementById(id);
                            var latlng = new google.maps.LatLng(47.012724, 6.731005);

                            var mapOptions = {zoom  : 10, center: latlng};

                            var map = new google.maps.Map(canvas, mapOptions);

                            var ctaLayer = new google.maps.KmlLayer({
                                url: 'http://aren.local/kml/<?php echo $troncon->kml; ?>?rand='+(new Date()).valueOf()
                            });

                            ctaLayer.setMap(map);
                            ctaLayer.set('preserveViewport', true);
                        });
                    </script>

                @endforeach
            @endif

            </div>
        </div>

    </div>
</div>

@stop