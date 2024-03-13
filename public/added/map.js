$(document).ready(function() { 
   if (navigator.geolocation) {
	navigator.geolocation.getCurrentPosition(showPosition);
   } else {
    
	alert('Your device is not support!');
	}

	function showPosition(data) {
		document.getElementById('latitude').value = data.coords.latitude
        document.getElementById('longitude').value = data.coords.longitude
		
		var map = L.map("map").setView(
			[data.coords.latitude, data.coords.longitude],
			13
		);

		L.tileLayer(
			"https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
				maxZoom: 18,
				id: "mapbox/streets-v11",
				tileSize: 512,
				zoomOffset: -1,
			}
		).addTo(map);

		L.marker([
			data.coords.latitude, data.coords.longitude
		])
			.addTo(map)
			.bindPopup("Location");
	}
});
	
	
	