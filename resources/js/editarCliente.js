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
window.openModal = openModal;

//seteo el estado del cliente
var estado = document.getElementById("estadoSeleccionado");
var optionSelected = document.getElementById(estado.value);
optionSelected.selected = true;

function editarContacto(contacto, idCliente) {
    var nombre = document.getElementById("nombreCliente");
    var apellido = document.getElementById("apellidoCliente");
    var mail = document.getElementById("mailCliente");
    var telefono = document.getElementById("telefonoCliente");
    var nacimiento = document.getElementById("nacimientoCliente");
    var rol = document.getElementById("rol" + contacto.rol.id);
    var id = document.getElementById("idCliente");
    //esta variable es para no perder el id del cliente
    var idContacto = document.getElementById("idContacto");

    nombre.value = contacto.nombre;
    apellido.value = contacto.apellido;
    mail.value = contacto.mail;
    telefono.value = contacto.telefono;
    nacimiento.value = contacto.fechaNacimiento;
    rol.selected = true;
    id.value = idCliente;
    idContacto.value = contacto.id;
    openModal(true);
}
window.editarContacto = editarContacto;
