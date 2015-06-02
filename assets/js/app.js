/*
 * Modules
 */

app = {

	/*
	 * Chargement du DOM
	 */
	init: function() {

		console.info("app.init")

		var geocoder;
		var map;

		// initialisation de la carte Google Map de départ
		geocoder = new google.maps.Geocoder();

		// Ici j'ai mis la latitude et longitude du 13 rue des ecluses st martin 75010 pour centrer la carte de départ
		var latlng = new google.maps.LatLng(48.876663,2.366438);
		var mapOptions = {
			zoom      : 13,
			center    : latlng,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		}

		// map-canvas est le conteneur HTML de la carte Google Map
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
		var adresse = $("#adresse-maps").attr('data-adress');
		var cp = $("#cp-maps").attr('data-cp');
		var ville = $("#ville-maps").attr('data-ville');
		var adressetotale = adresse + ' ' + cp + ' ' + ville;
		  
		geocoder.geocode({ 
			'address': adressetotale
		},
		function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {

				map.setCenter(results[0].geometry.location);
				var strposition = results[0].geometry.location+"";
				strposition=strposition.replace('(', '');
				strposition=strposition.replace(')', '');

				// Création du marqueur du lieu (épingle)
	    		var image = './assets/img/marqueur.png';
				var marker = new google.maps.Marker({
					map: map,
					icon: image,
					position: results[0].geometry.location
				});

			} else {

			  alert('Adresse introuvable: ' + status);

			}
		});
	}
}


/*
 * Chargement du DOM
 */
$(function() {
	app.init()
})