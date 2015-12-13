<h4>{{ $carte->name }}</h4>

{!! Form::open(array('route' => array('admin.troncon.destroy', $carte->id), 'method' => 'delete')) !!}
<p>
    <a href="{{ url('admin/troncon/'.$carte->id) }}" class="btn btn-sm btn-info">&eacute;diter</a>
    <button data-what="supprimer" data-action="carte {{ $carte->name }}" class="btn btn-danger btn-sm deleteAction pull-right">Supprimer</button>
</p>
{!! Form::close()!!}

<div class="map-wrapper map-small map-backend" style="height:400px;width: 100%;">
    <div id="map_canvas_{{ $carte->id }}" style="height:390px;width: 100%;"></div>
</div>

<script>
    var canvas     = document.getElementById('map_canvas_<?php echo $carte->id; ?>');
    var latlng     = new google.maps.LatLng(47.012724, 6.731005);
    var mapOptions = {zoom : 10, center: latlng};
    var map        = new google.maps.Map(canvas, mapOptions);

    var ctaLayer = new google.maps.KmlLayer({
        url: 'http://aren.ch/kml/<?php echo $carte->kml; ?>?rand='+(new Date()).valueOf()
    });

    ctaLayer.setMap(map);
    ctaLayer.set('preserveViewport', true);

</script>