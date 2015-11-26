function initialize() {

    var canvas    = document.getElementById('map-canvas');
    var latitude  = canvas.dataset.latitude;
    var longitude = canvas.dataset.longitude;
    var zoom      = canvas.dataset.zoom;
    var latlng    = new google.maps.LatLng(latitude, longitude);

    var mapOptions = {
        zoom  : parseInt(zoom),
        center: latlng
    };

    var map = new google.maps.Map(canvas, mapOptions);

    var ctaLayer = new google.maps.KmlLayer({
        url: 'http://www.aren.ch/kml/trace_consult_T2.kml?rand='+(new Date()).valueOf()
    });

    ctaLayer.setMap(map);
    ctaLayer.set('preserveViewport', true);

    // second
    var ctaLayer2 = new google.maps.KmlLayer({
        url: 'http://www.aren.ch/kml/test.kml?rand='+(new Date()).valueOf()
    });
    ctaLayer2.setMap(map);
    ctaLayer2.set('preserveViewport', true);

    // third
    var ctaLayer5 = new google.maps.KmlLayer({
        url: 'http://www.aren.ch/kml/traces_T3.kml?rand='+(new Date()).valueOf()
    });
    ctaLayer5.setMap(map);
    ctaLayer5.set('preserveViewport', true);

    // POI T3
    var ctaLayer6 = new google.maps.KmlLayer({
        url: 'http://www.aren.ch/kml/POI_T3.kml?rand='+(new Date()).valueOf()
    });
    ctaLayer6.setMap(map);
    ctaLayer6.set('preserveViewport', true);

    // POI
    var ctaLayer3 = new google.maps.KmlLayer({
        url: 'http://www.aren.ch/kml/POI_T2.kml?rand='+(new Date()).valueOf()
    });
    ctaLayer3.setMap(map);
    ctaLayer3.set('preserveViewport', true);

    // prestataires
    var ctaLayer4 = new google.maps.KmlLayer({
        url: 'http://www.aren.ch/kml/generate.kml?rand='+(new Date()).valueOf()
    });
    ctaLayer4.setMap(map);
    ctaLayer4.set('preserveViewport', true);

}

google.maps.event.addDomListener(window, 'load', initialize);
