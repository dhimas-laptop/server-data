	var map = L.map('map').setView([0.905948, 104.536992], 15);
    var lokasi;
    
    L.marker([0.905948, 104.536992]).addTo(map);
    
	var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19
	}).addTo(map);