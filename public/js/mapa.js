
function map(){
    let map = L.map('map').setView([42.866924, -2.676800], 8);

    L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=TALcQipMfxgGJSNPScri', {
        attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">&copy; MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">&copy; OpenStreetMap contributors</a>',

    }).addTo(map);
}
