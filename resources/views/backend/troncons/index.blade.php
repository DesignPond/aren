@extends('backend.layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="options text-right" style="margin-bottom: 10px;">
            <div class="btn-toolbar">
               <a href="{{ url('admin/troncon/create') }}" class="btn btn-success"><i class="fa fa-plus"></i> &nbsp;Ajouter</a>
            </div>
        </div>

        <div class="panel panel-midnightblue">
            <div class="panel-heading">
                <h4><i class="fa fa-tasks"></i> &nbsp;Tronçons</h4>
            </div>
            <div class="panel-body">

            @if(!$troncons->isEmpty())
                <?php $chunks = $troncons->chunk(2); ?>
                @foreach($chunks as $chunk)
                    <div class="row">
                        @foreach($chunk as $troncon)
                            <div class="col-md-6">
                                <h4>{{ $troncon->name }}</h4>

                                <div class="options">
                                    <a href="{{ url('admin/troncon/'.$troncon->id) }}" class="btn btn-info">&eacute;diter</a>
                                </div>

                                <div class="map-wrapper map-small" style="height:400px;">
                                    <div id="map_canvas_{{ $troncon->id }}" style="height:400px;"></div>
                                </div>

                                <script>
                                    var canvas = document.getElementById('map_canvas_<?php echo $troncon->id; ?>');
                                    var latlng = new google.maps.LatLng(47.012724, 6.731005);

                                    var mapOptions = {zoom : 10, center: latlng};

                                    var map = new google.maps.Map(canvas, mapOptions);

                                    var ctaLayer = new google.maps.KmlLayer({
                                        url: 'http://aren.ch/kml/<?php echo $troncon->kml; ?>?rand='+(new Date()).valueOf()
                                    });

                                    ctaLayer.setMap(map);
                                    ctaLayer.set('preserveViewport', true);
                                </script>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            @endif

            </div>
        </div>

    </div>
</div>

@stop