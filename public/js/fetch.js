window.addEventListener('load', function () {
	var selectPaises = document.querySelector('#country');
	var selectProvincias = document.querySelector('#city');
	var contenedorProvincias = selectProvincias.parentElement.parentElement;

	fetch('https://restcountries.eu/rest/v2/all')
		.then(function (response) {
			return response.json(); // array de objetos literales
		})
		.then(function (data) {
			data.forEach(function (unPais) {
				var option = document.createElement('option');
				option.innerText = unPais.name;
				option.setAttribute('value', unPais.name);
				selectPaises.append(option);
				// selectPaises.innerHTML += `<option value="${unPais.name}">${unPais.name}</option>`;
			});
		})
		.catch(function (error) {
			console.log('El error fue: ' + error);
		});

	selectPaises.addEventListener('change', function () {
		if (this.value.toLowerCase() === 'argentina') {
			contenedorProvincias.style.display = 'block';

			fetch('https://apis.datos.gob.ar/georef/api/provincias')
				.then(function (response) {
					return response.json(); // array de objetos literales
				})
				.then(function (data) {
					data.provincias.forEach(function (unaProvincia) {
						selectProvincias.innerHTML += `<option value="${unaProvincia.nombre}">${unaProvincia.nombre}</option>`;
					});
				})
				.catch(function (error) {
					console.log('El error fue: ' + error);
				});
		} else {
			contenedorProvincias.style.display = 'none';
			selectProvincias.innerHTML = '<option value="">Elegí una provincia</option>';
		}
	});
});
