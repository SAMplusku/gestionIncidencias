
function mapa(){
    console.log("Error")

    let map = L.map('map').setView([42.866924, -2.676800], 8);

    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

    }).addTo(map);

    console.log("Error")

    let popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent(e.latlng.lat.toString() + ", " +  e.latlng.lng.toString())
            .openOn(map);

        let localizacion = localizacion.setContent(e.latlng.lat.toString() + ", " +  e.latlng.lng.toString());
    }

    map.on('click', onMapClick);


}
