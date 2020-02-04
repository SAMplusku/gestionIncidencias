
let map = L.map('map').setView([42.866924, -2.676800], 8);

//'http://{s}.tile.osm.org/{z}/{x}/{y}.png'


/*L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
    attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

}).addTo(map);*/


L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://osm.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);


var searchControl = L.esri.Geocoding.geosearch().addTo(map);

var results = L.layerGroup().addTo(map);


//let popup = L.popup();
let marker = L.marker();

function onMapClick(e) {
    /* popup
         .setLatLng(e.latlng)
         .setContent(e.latlng.lat.toString() + ", " + e.latlng.lng.toString())
         .openOn(map);*/


    marker
        .setLatLng(e.latlng)
        .addTo(map);

    searchControl.on('results', function (data) {
        results.clearLayers();
        for (var i = data.results.length - 1; i >= 0; i--) {
            results.addLayer(marker);
        }
    });

    let localizacion1 = e.latlng.lat.toString() + ", " + e.latlng.lng.toString();

    let latitud = e.latlng.lng.toString();
    let longitud = e.latlng.lat.toString();


    document.getElementById('localizacion').value = localizacion1;
    document.getElementById('latitud').value = latitud;
    document.getElementById('longitud').value = longitud;
    console.log(latitud.toString());
    console.log(longitud.toString());


    let locTec = 0;
    //let localizacionesTec =<?php echo json_encode($localizacionesT);?>;
    let idtec = document.getElementById('id_tecnico').value;
    for (let i = 0; i < localizacionesTec.length; i++) {
        if (localizacionesTec[i][idtec]) {
            locTec = localizacionesTec[i][idtec];
        }
    }

    console.log(locTec)

    let numero1 = locTec.substring(0, 17);
    let numero2 = locTec.substring(19);
    let locTecnico = numero1 + ", " + numero2;

    console.log(locTecnico.toString());



    L.Routing.control({
        waypoints: [
            L.latLng(longitud, latitud),
            L.latLng(numero1, numero2)
        ],
        routeWhileDragging: true
    }).addTo(map);



    //https://www.liedman.net/leaflet-routing-machine/tutorials/interaction/
}

map.on('click', onMapClick);
