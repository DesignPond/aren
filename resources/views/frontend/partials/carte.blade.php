@if(!$cartes->isEmpty())
    @foreach($cartes as $carte)
        <script>

            var ctaLayer = new google.maps.KmlLayer({
                url: 'http://aren.ch/kml/<?php echo $carte->kml; ?>?rand='+(new Date()).valueOf()
            });

            ctaLayer.setMap(map);
            ctaLayer.set('preserveViewport', true);

        </script>
    @endforeach
@endif

<script>

    var ctaLayer4 = new google.maps.KmlLayer({
        url: 'http://aren.ch/kml/prestataires.kml?<?php echo rand(1000, 200000); ?>'
    });

    ctaLayer4.setMap(map);
    ctaLayer4.set('preserveViewport', true);

</script>