const formulario = document.getElementById('formulario-adoptar');
const inputs = document.querySelectorAll('#formulario-adoptar input');
const expresiones = {
	ocupacion: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
}

const campos = {
	ocupacion: false	
}

const validarFormulario = (e) =>{
	switch (e.target.name){
		case "ocupation":
			if(expresiones.ocupacion.test(e.target.value)){
				document.getElementById('grupo__ocupacion').classList.remove('formulario__grupo-incorrecto');
				document.getElementById('grupo__ocupacion').classList.add('formulario__grupo-correcto');
				document.querySelector('#grupo__ocupacion i').classList.add('fa-check-circle');
				document.querySelector('#grupo__ocupacion i').classList.remove('fa-times-circle');
				campos['ocupacion']=true;		
			} else{
				document.getElementById('grupo__ocupacion').classList.add('formulario__grupo-incorrecto');
				document.getElementById('grupo__ocupacion').classList.remove('formulario__grupo-correcto');
				document.querySelector('#grupo__ocupacion i').classList.add('fa-times-circle');
				document.querySelector('#grupo__ocupacion i').classList.remove('fa-check-circle');
				campos['ocupacion']=false;
			}
		break;
	}
}

inputs.forEach((input)=>{
	input.addEventListener('keyup',validarFormulario);
	input.addEventListener('blur',validarFormulario);
});

formulario.addEventListener('submit',(e)=>{
	e.preventDefault()

	if(campos.ocupacion){
		formulario.reset();

		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');

		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 3000);
		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});

	} else{
		document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
	}
});

