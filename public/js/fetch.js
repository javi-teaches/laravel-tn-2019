window.addEventListener('load', function () {
	var selectPaises = document.querySelector('#country');
	var selectProvincias = document.querySelector('#city');
	var contenedorProvincias = selectProvincias.parentElement.parentElement;

	// Función genérica para hacer llamados FETCH
	function genericFetchCall (endPoint, callback) {
		fetch(endPoint)
			.then(function (response) {
				return response.json(); // array de objetos literales
			})
			.then(function (data) {
				callback(data);
			})
			.catch(function (error) {
				console.log('El error fue: ' + error);
			});
	}

	// Función para traer los países e insertarlos en el selectPaises
	function insertCountries (countries) {
		countries.forEach(function (oneCountry) {
			selectPaises.innerHTML += `<option value="${oneCountry.name}">${oneCountry.name}</option>`;
		});
	}

	// Llamamos a la api de Paises
	genericFetchCall('https://restcountries.eu/rest/v2/all', insertCountries);

	// Función para traer las provincias e insertarlas en el selectProvincias
	function insertProvinces (provinces) {
		provinces.provincias.forEach(function (unaProvincia) {
			selectProvincias.innerHTML += `<option value="${unaProvincia.nombre}">${unaProvincia.nombre}</option>`;
		});
	}

	selectPaises.addEventListener('change', function () {
		if (this.value.toLowerCase() === 'argentina') {
			contenedorProvincias.style.display = 'flex';
			genericFetchCall('https://apis.datos.gob.ar/georef/api/provincias', insertProvinces);
		} else {
			contenedorProvincias.style.display = 'none';
			selectProvincias.innerHTML = '<option value="">Elegí una provincia</option>';
		}
	});
});
