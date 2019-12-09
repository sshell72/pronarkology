$(document).ready(function() {
	ymaps.ready(init);        
	function init() {
		var myMap = new ymaps.Map("map", {
			center: [$('#map').attr('data-lat'), $('#map').attr('data-lon')],
			zoom: 10
			}, {
			searchControlProvider: 'yandex#search'
		});
		
		/* Начальный адрес метки */
		/*	var address = 'Россия, Москва, Тверская, д. 7';
			
		ymaps.geocode(address).then(function(res) { */
		var coord = [$('#map').attr('data-lat'), $('#map').attr('data-lon')];
		
		var myPlacemark = new ymaps.Placemark(coord, null, {
			preset: 'islands#blueDotIcon',
			draggable: true
		});
		
		/* Событие dragend - получение нового адреса */
		myPlacemark.events.add('dragend', function(e){
			var cord = e.get('target').geometry.getCoordinates();
			$('#ypoint').val(cord);
			$('#acf-field_5ded28525e774').val(cord[0]);
			$('#acf-field_5ded29d55e775').val(cord[1]);
			ymaps.geocode(cord).then(function(res) {
				var data = res.geoObjects.get(0).properties.getAll();
				$('#address').val(data.text);
			});
		});
		
		myMap.events.add('click', function(e) {
			myPlacemark.geometry.setCoordinates(e.get('coords'));
			$('#acf-field_5ded28525e774').val(e.get('coords')[0]);
			$('#acf-field_5ded29d55e775').val(e.get('coords')[1]);
		});
		
		myMap.geoObjects.add(myPlacemark);	
		myMap.setCenter(coord, 15);
		/* }); */
	}
	
});
