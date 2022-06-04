// Initialize and add the map 4.587357491415826, -74.12100161405188
function initMap() {
    // The location of Uluru
    const nova = { lat: 4.587357491415826, lng: -74.12100161405188 };
    console.log(nova);
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 11,
        center: nova,
    });

    for (let i = 0; i < distribuidores.length; i++) {
        const latLng = new google.maps.LatLng(distribuidores[i].latitud, distribuidores[i].longitud);

        new google.maps.Marker({
            position: latLng,
            map: map,
            title: distribuidores[i].distribuidor,
        });
    }

    // console.log(distribuidores);
    // // The marker, positioned at Uluru
    // const marker = new google.maps.Marker({
    //     position: nova,
    //     map: map,
    // });
}

window.initMap = initMap;