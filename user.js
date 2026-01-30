const nombre = document.getElementById("name");
const apellido = document.getElementById("lastname");
const usuario = document.getElementById("user");
const email = document.getElementById("correo");
const numero = document.getElementById("numero");
const form = document.getElementById("form");
const parrafo = document.getElementById("warnings");

let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
let regexnombre = /^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/;
let regexUsuario = /^[a-z0-9_-]{3,16}$/;
let regexNumero = /^[0-9]{9}$/;

// Función para mostrar mensajes de error
function mostrarError(campo, mensaje) {
    parrafo.innerHTML = mensaje;
    campo.classList.add("error");
}

// Función para quitar mensajes de error
function quitarError(campo) {
    parrafo.innerHTML = "";
    campo.classList.remove("error");
}

// Función para validar campos vacíos
function validarCampos() {
    if (nombre.value.trim() === "") {
        mostrarError(nombre, "El nombre es obligatorio");
        return false;
    }

    if (apellido.value.trim() === "") {
        mostrarError(apellido, "El apellido es obligatorio");
        return false;
    }

    if (usuario.value.trim() === "") {
        mostrarError(usuario, "El usuario es obligatorio");
        return false;
    }

    if (email.value.trim() === "") {
        mostrarError(email, "El email es obligatorio");
        return false;
    }

    if (numero.value.trim() === "") {
        mostrarError(numero, "El número es obligatorio");
        return false;
    }

    return true;
}

nombre.addEventListener("input", () => {
    quitarError(nombre);
    if (!regexnombre.test(nombre.value)) {
        mostrarError(nombre, "El nombre no es válido");
    }
});

apellido.addEventListener("input", () => {
    quitarError(apellido);
    if (!regexnombre.test(apellido.value)) {
        mostrarError(apellido, "El apellido no es válido");
    }
});

usuario.addEventListener("input", () => {
    quitarError(usuario);
    if (!regexUsuario.test(usuario.value)) {
        mostrarError(usuario, "Usuario no válido");
    }
});

email.addEventListener("input", () => {
    quitarError(email);
    if (!regexEmail.test(email.value)) {
        mostrarError(email, "El email no es válido");
    }
});

numero.addEventListener("input", () => {
    quitarError(numero);
    if (!regexNumero.test(numero.value)) {
        mostrarError(numero, "El número no es válido");
    }
});

form.addEventListener("submit", e => {
    e.preventDefault();

    if (validarCampos()) {
        parrafo.innerHTML = "Enviado";
        form.submit();
    }
});