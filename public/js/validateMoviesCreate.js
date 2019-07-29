// Capturamos al formulario
var theForm = document.querySelector('form');

// Obtenemos todos los campos, pero parseamos la colección a un Array
var formInputs = Array.from(theForm.elements);

// Sacamos la 1er posición del array que es el un <input> hidden del token
formInputs.shift();

// Sacamos al último elemento que es el <button>
formInputs.pop();

// Expresión regular para validar solo números
var regexNumber = /^\d+$/;

// Recorremos el array y asignamos la validación básica
formInputs.forEach(function (oneInput) {
	// A cada campo le asignamos el evento blur y su funcionalidad
	oneInput.addEventListener('blur', function () {
		// Pregunto si el campo está vacío (previo trimeo de espacios)
		if (this.value.trim() === '') {
			// Si el campo está vacío, le agrego la clase 'is-invalid'
			this.classList.add('is-invalid');
			// Ademas, al <div> con clase 'invalid-feedback' le agremamos el texto de error
			this.nextElementSibling.innerHTML = 'El campo <b>' + this.getAttribute('data-nombre') + '</b> es obligatorio';
		} else {
			// Cuando el campo NO está vacío

			// Quitamos la clase de error SI existiera
			this.classList.remove('is-invalid');

			// Si la data es correcta, asignamos esta clase de bootstrap
			this.classList.add('is-valid');

			// Al mensaje de error le sacamos el texto
			this.nextElementSibling.innerHTML = '';

			// Validamos el tipo de dato del campo title
			if (this.name === 'title') {
				// Validamos que el texto insertado NO supere las 15 letras
				if (this.value.length > 15) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'El título debe ser inferior a 15 letras';
				}
			}

			// Validamos el campo rating para verificar que sean solo números
			if (this.name === 'rating') {
				if (!regexNumber.test(this.value.trim())) {
					this.classList.add('is-invalid');
					this.nextElementSibling.innerHTML = 'Este campo solo admite números';
				}
			}
		}
	});

	oneInput.addEventListener('focus', function () {
		var inputName = this.name;
		switch (inputName) {
			case 'title':
				console.log('Título de la película inferior a 15 letras');
				break;
			case 'rating':
				console.log('Solamente números');
				break;
		};
	});
});

// Si tratan de enviar el formulario
theForm.addEventListener('submit', function (event) {
	// Pregunto si el primer campo (título) ó el segundo campo (rating) están vació
	if (formInputs[0].value.trim() === '' || formInputs[1].value.trim() === '') {
		// Si está vacío evito que se envíe la data
		event.preventDefault();
		window.alert('Hay campos vacíos');
	}
});
