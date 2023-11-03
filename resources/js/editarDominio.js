var dueño = document.getElementById("dueñoGet");
var titular = document.getElementById("titularGet");
var cliente = document.getElementById("clienteGet");
var estado = document.getElementById("estadoGet");
document.onload(
    editarDominio(titular.value, cliente.value, dueño.value, estado.value)
);
function editarDominio(titular, cliente, dueño, estado) {
    document.getElementById("idCliente").selectedIndex = cliente;
    document.getElementById("idDueño").selectedIndex = dueño;
    document.getElementById("idTitular").selectedIndex = titular;
    switch (estado) {
        case "ACTIVO":
            document.getElementById("idEstado").selectedIndex = 0;
            break;
        case "EN REPOSO":
            document.getElementById("idEstado").selectedIndex = 1;
            break;
        case "BAJA PERMANENTE":
            document.getElementById("idEstado").selectedIndex = 2;
            break;
        case "TRANSFERIDO":
            document.getElementById("idEstado").selectedIndex = 3;
            break;
        case "VENCIDO":
            document.getElementById("idEstado").selectedIndex = 4;
            break;
    }
}
window.editarDominio = editarDominio;
