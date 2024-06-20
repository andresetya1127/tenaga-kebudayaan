document.addEventListener("DOMContentLoaded", function () {
    Livewire.on("dataMaps", (data) => {
        let cView = data[0].centerView;

        const map = L.map("map").setView(cView, 12);

        const tiles = L.tileLayer(
            "https://tile.openstreetmap.org/{z}/{x}/{y}.png",
            {
                maxZoom: 19,
            }
        ).addTo(map);

        let data_marker = data[0].marker;
        // Buat grup marker
        var markers = L.markerClusterGroup();
        // Tambahkan grup marker ke peta
        map.addLayer(markers);

        function onMapClick(e) {
            // Copy the text inside the text field
            navigator.clipboard.writeText(e.latlng.lat + "," + e.latlng.lng);

            L.popup()
                .setLatLng(e.latlng)
                .setContent(`Posisi Latitude : ${e.latlng.toString()} copied!`)
                .openOn(map);
        }

        map.on("click", onMapClick);

        // Icon Marker

        // #####    Pengembangan   #####
        function getIcon(icon) {
            let option = {
                red: {
                    iconUrl:
                        "http://127.0.0.1:8000/storage/photos/logo-web/red.png",
                    iconSize: [30, 45], // size of the icon
                    shadowSize: [50, 64], // size of the shadow
                    iconAnchor: [5, 24], // point of the icon which will correspond to marker's location
                    shadowAnchor: [4, 62], // the same for the shadow
                    popupAnchor: [-3, -76],
                },
                green: {
                    iconUrl:
                        "http://127.0.0.1:8000/storage/photos/logo-web/green.png",
                    iconSize: [30, 45], // size of the icon
                    shadowSize: [50, 64], // size of the shadow
                    iconAnchor: [5, 24], // point of the icon which will correspond to marker's location
                    shadowAnchor: [4, 62], // the same for the shadow
                    popupAnchor: [-3, -76],
                },
            };

            return L.icon(option[icon]);
        }

        try {
            $.each(data_marker, function (index, val) {
                L.marker([val.data.latitude, val.data.longitude], {
                    icon: getIcon(val.icon),
                })
                    .addTo(markers)
                    .bindTooltip(
                        `
                <b class="text-center">
                <i class="fa-solid fa-earth-americas"></i> ${val.data.nama_cagar}
            `
                    )
                    .openTooltip();
            });
        } catch (error) {
            console.log(error);
        }

        var iconLoc = L.icon({
            iconUrl:
                "https://images.ctfassets.net/3prze68gbwl1/assetglossary-17su9wok1ui0z7w/c4c4bdcdf0d0f86447d3efc450d1d081/map-marker.png",

            iconSize: [38, 38],
            iconAnchor: [22, 22],
            popupAnchor: [-3, -4],
        });

        // Lokasi Anda
        //     if ("geolocation" in navigator) {
        //         navigator.geolocation.getCurrentPosition(function (position) {
        //             var latlng = [
        //                 position.coords.latitude,
        //                 position.coords.longitude,
        //             ];
        //             L.marker(latlng, {
        //                 icon: iconLoc,
        //             })
        //                 .addTo(map)
        //                 .bindPopup("Lokasi Anda")
        //                 .openPopup();
        //         });
        //     } else {
        //         alert("Geolocation is not supported by your browser.");
        //     }
    });
});
