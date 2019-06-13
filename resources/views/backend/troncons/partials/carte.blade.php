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

	map = new google.maps.Map(document.getElementById('map_canvas_<?php echo $carte->id; ?>'), {
	   center: {lat: 47.012724, lng: 6.731005},
	   zoom: 10,
	
	});
  
    var layer = new google.maps.KmlLayer({
        url: 'http://aren.ch/kml/<?php echo $carte->kml; ?>?rand='+(new Date()).valueOf()
    });

    layer.setMap(map);
    layer.set('preserveViewport', true);

</script>