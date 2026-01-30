const nombre = document.getElementById("name")
const apellido = document.getElementById("lastname")
const email = document.getElementById("email")
const pass = document.getElementById("password")
const terminos = document.getElementById("terminos")
const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit", e=>{
    e.preventDefault()
    let warnings = ""
    let entrar = false
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    let regexnombre = /^[ a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/
    parrafo.innerHTML = ""
    if(!regexnombre.test(nombre.value)){
        warnings += `El nombre no es valido <br>`
        entrar = true
    }
    if(!regexnombre.test(apellido.value)){
        warnings += `El apellido no es valido <br>`
        entrar = true
    }
    if(!regexEmail.test(email.value)){
        warnings += `El email no es valido <br>`
        entrar = true
    }
    if(pass.value.length < 5){
        warnings += `La contraseña debe contener mas de 5 dígitos <br>`
        entrar = true
    }
    if(!terminos.checked){
        warnings += `Acepta los términos y condiciones <br>`
        entrar = true
    }

    if(entrar){
        parrafo.innerHTML = warnings
    }else{
        parrafo.innerHTML = "Enviado"
        form.submit();
    }
})