    /**
     * Moves the map to display over Berlin
     *
     * @param  {H.Map} map      A HERE Map instance within the application
     */
    function moveMapTo(map) {
        map.setCenter({
            lat: document.getElementById('latitude').value,
            lng: document.getElementById('longitude').value
        }); //-23.3504402,-53.426321,11
        map.setZoom(13);
    }
    /**
     * Boilerplate map initialization code starts below:
     */

    //Step 1: initialize communication with the platform
    // In your own code, replace variable window.apikey with your own apikey
    //var json = require('credenciais.json');
    //var  json = JSON.parse(credenciais)
    var platform = new H.service.Platform({
        apikey: 'LT_tNVtE1Y2ZFhJ0DferbwMzG9VATlx2f_wAVxd_uAM'
    });
    var defaultLayers = platform.createDefaultLayers();

    //Step 2: initialize a map - this map is centered over Europe
    var map = new H.Map(document.getElementById('mapContainer'),
        defaultLayers.vector.normal.map, {
            center: {
                lat: -13.7039288,
                lng: -69.6716956
            },
            zoom: 4,
            pixelRatio: window.devicePixelRatio || 1
        });
    // add a resize listener to make sure that the map occupies the whole container
    window.addEventListener('resize', () => map.getViewPort().resize());

    //Step 3: make the map interactive
    // MapEvents enables the event system
    // Behavior implements default interactions for pan/zoom (also on mobile touch environments)
    var behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));

    // Create the default UI components
    var ui = H.ui.UI.createDefault(map, defaultLayers);