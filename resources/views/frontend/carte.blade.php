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

    
    <?php 
	    
	    $maps = $cartes->map(function ($carte, $key) {
		    return $carte->kml;
		});
    ?>
    
	<script>
	
		function initMap() {
			
			var cartes =  {!! $maps->toJson() !!};
			var map;
			
			map = new google.maps.Map(document.getElementById('map_canvas_main'), {
			   center: {lat: 47.012724, lng: 6.731005},
			   zoom: 10
			});
			
			cartes.forEach(function(carte) {
			    console.log(carte);
				
			    var layer = new google.maps.KmlLayer({
	                url: 'http://aren.ch/kml/'+ carte +'?rand='+(new Date()).valueOf()
	            });
	
	            layer.setMap(map);
	            layer.set('preserveViewport', true);
			});

			
			var ctaLayer4 = new google.maps.KmlLayer({
			    url: 'http://aren.ch/kml/prestataires.kml?<?php echo rand(1000, 200000); ?>'
			});
			
			ctaLayer4.setMap(map);
			ctaLayer4.set('preserveViewport', true);
			
		}
	</script>


    <div class="content-page" style="margin-top: 30px;">
        {!! $page->content !!}
    </div>

</section>
@stop