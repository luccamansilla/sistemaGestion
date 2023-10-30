const modal_overlay = document.querySelector("#modal_overlay");
const modal = document.querySelector("#modal");
var contactos = [];
function openModal(value) {
    const modalCl = modal.classList;
    const overlayCl = modal_overlay;

    if (value) {
        overlayCl.classList.remove("hidden");
        overlayCl.classList.add("flex");
        setTimeout(() => {
            modalCl.remove("opacity-0");
            modalCl.remove("-translate-y-full");
            modalCl.remove("scale-150");
        }, 100);
    } else {
        modalCl.add("-translate-y-full");
        setTimeout(() => {
            modalCl.add("opacity-0");
            modalCl.add("scale-150");
        }, 100);
        setTimeout(() => overlayCl.classList.add("hidden"), 300);
    }
}

function guardarContacto() {
    let nombre = document.getElementById("nombreCliente");
    let apellido = document.getElementById("apellidoCliente");
    let rol = document.getElementById("idRol");
    let mail = document.getElementById("mailCliente");
    let telefono = document.getElementById("telefonoCliente");
    let nacimiento = document.getElementById("nacimientoCliente");
    //Objeto cliente
    var contacto = {
        nombre: nombre.value,
        apellido: apellido.value,
        rol: rol.selectedIndex,
        mail: mail.value,
        telefono: telefono.value,
        nacimiento: nacimiento.value,
    };
    //subo el objeto al array
    contactos.push(contacto);
    console.log(contactos);
    //reseteo los valores
    nombre.value = null;
    apellido.value = null;
    rol.value = 0;
    mail.value = null;
    telefono.value = null;
    nacimiento.value = null;
    //despues de resetear los valores cierro el modal
    openModal(false);
    //Mando al formulario el json con el array
    document.getElementById("idClientesArray").value =
        JSON.stringify(contactos);
}

//Agrego las funciones para que las pueda utilizar el blade
window.openModal = openModal;
window.guardarContacto = guardarContacto;
