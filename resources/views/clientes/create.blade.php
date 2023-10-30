@vite(['resources/js/crearCliente.js']);
<x-app-layout>
    <form method="POST" action="{{ route('cliente.store') }}" id="idFormulario">
        @csrf
        <div class="bg-gray-50 flex flex-col justify-center relative overflow-hidden h-full w-full">
            <div class=" bg-white rounded shadow-lg p-4 ">
                <div class="text-gray-600 col-span-2 pl-6">
                    <p class="font-medium text-4xl">CARGAR CLIENTE</p>
                    <p>Todos los campos son necesarios.</p>
                </div>
                <div class="grid text-sm lg:grid-cols-2">
                    <div class="grid-cols-2">
                        <div class="grid-cols-1 px-4">
                            <x-label for="nombre">Nombre del cliente</x-label>
                            <x-input type="text" name="nombre" id="nombre"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="Ingrese el nombre del dominio" />
                        </div>
                        <div class="grid-cols-1 px-4">
                            <x-label for="razonSocial">Razon social</x-label>
                            <x-input type="text" name="razonSocial" id="razonSocial"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="Ingrese la razon social..." />
                        </div>
                    </div>
                    <div class="grid-cols-2">
                        <div class="grid-cols-1 px-4">
                            <x-label for="email">Email</x-label>
                            <x-input type="text" name="email" id="email"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="Ingrese el e-mail..." />
                        </div>
                        <div class="grid-cols-1 px-4">
                            <x-label for="dni">DNI</x-label>
                            <x-input type="number" name="dni" id="dni"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="Ingrese el DNI..." />
                        </div>
                    </div>
                    <div class="grid-cols-2">
                        <div class="grid-cols-1 px-4">
                            <x-label for="cuil">CUIL</x-label>
                            <x-input type="text" name="cuil" id="cuil"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="Ingrese el CUIL..." />
                        </div>
                        <div class="grid-cols-1 px-4">
                            <x-label for="telefono">Telefono de contacto.</x-label>
                            <x-input type="number" name="telefono" id="telefono"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="Ingrese el nro de telefono..." />
                        </div>
                    </div>
                    <div class="grid-cols-2">
                        <div class="grid-cols-2 px-4">
                            <x-buttonClassic onclick="openModal(true)">Contactos</x-buttonClassic>

                        </div>
                    </div>
                </div>
                <div class="grid-cols-2">
                    <div class="col-span-2 md:row-span-3 justify-center place-items-center px-4">
                        <x-label for="estado">Estado del cliente</x-label>
                        <select name="estado" id="" class="rounded-lg">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="PROSPECTO">PROSPECTO</option>
                            <option value="BAJA PERMANENTE">BAJA PERMANENTE</option>
                            <option value="CUENTA SUSPENDIDA">CUENTA SUSPENDIDA</option>
                        </select>
                    </div>
                    <div class="col-span-2 md:row-span-3 justify-center place-items-center px-4 hidden">
                        <x-input type="hidden" name="clientesArray" id="idClientesArray"></x-input>
                    </div>

                </div>
                <div class="grid grid-cols-2 text-right items-end py-4">
                    <div class="inline-flex items-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Cargar
                            cliente</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>
//MODAL
<div id="modal_overlay"
    class="hidden absolute inset-0 bg-black bg-opacity-30  w-full justify-center items-start md:items-center pt-10 md:pt-0">
    {{-- modal --}}
    <div id="modal"
        class="opacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">

        {{-- Cerrar esquina --}}
        <button type="button" onclick="openModal(false)"
            class="absolute -top-3 -right-3 bg-red-500 hover:bg-red-600 text-2xl w-10 h-10 rounded-full focus:outline-none text-white">
            &cross;
        </button>
        {{-- titulo --}}
        <div class="px-4 py-3 border-b border-gray-200">
            <h2 class="text-xl font-semibold text-gray-600">CONTACTO DEL CLIENTE</h2>
        </div>
        {{-- body --}}
        <div class="w-full p-3 grid grid-cols-2">
            {{-- col span 3 --}}

            <div class="grid-cols-1">
                <x-label for="nombreCliente">Nombre</x-label>
                <x-input id="nombreCliente" class="grid-cols-3"></x-input>
            </div>
            <div class="grid-cols-1">
                <x-label for="rolCliente">Rol</x-label>
                <select id="idRol" class="grid-cols-1 border-gray-300 rounded-lg w-52">
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->rol }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid-cols-1">
                <x-label for="apellidoCliente">Apellido</x-label>
                <x-input id="apellidoCliente" class="grid-cols-1"></x-input>
            </div>
            <div class="grid-cols-1">
                <x-label for="mailCliente">Mail</x-label>
                <x-input id="mailCliente"></x-input>
            </div>
            <div class="grid-cols-1">
                <x-label for="telefonoCliente">Telefono</x-label>
                <x-input type="number" id="telefonoCliente"></x-input>
            </div>
            <div class="grid-cols-1">
                <x-label for="nacimientoCliente">Fecha de Nacimiento</x-label>
                <x-input type="date" id="nacimientoCliente"></x-input>
            </div>
        </div>

        {{-- Boton cerrar --}}
        <div
            class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
            <x-buttonClassic type="button" onclick="guardarContacto()">Guardar Contacto</x-buttonClassic>
            <x-buttonClassic type="button" onclick="openModal(false)">Cerrar</x-buttonClassic>
        </div>
    </div>
</div>

{{--  Estos scripts lo pase a la carpeta public/js/crearCliente.js
<script>
    const modal_overlay = document.querySelector('#modal_overlay');
    const modal = document.querySelector('#modal');

    function openModal(value) {

        const modalCl = modal.classList
        const overlayCl = modal_overlay

        if (value) {
            overlayCl.classList.remove('hidden');
            overlayCl.classList.add('flex');
            setTimeout(() => {
                modalCl.remove('opacity-0')
                modalCl.remove('-translate-y-full')
                modalCl.remove('scale-150')
            }, 100);
        } else {
            modalCl.add('-translate-y-full')
            setTimeout(() => {
                modalCl.add('opacity-0')
                modalCl.add('scale-150')
            }, 100);
            setTimeout(() => overlayCl.classList.add('hidden'), 300);
        }
    }
</script>
<script>
    //Arreglo donde guardo los contactos que se van cargando
    var contactos = [];

    function guardarContacto() {
        let nombre = document.getElementById('nombreCliente');
        let apellido = document.getElementById('apellidoCliente');
        let rol = document.getElementById('idRol');
        let mail = document.getElementById('mailCliente');
        let telefono = document.getElementById('telefonoCliente');
        let nacimiento = document.getElementById('nacimientoCliente');
        //Objeto cliente 
        var contacto = {
            nombre: nombre.value,
            apellido: apellido.value,
            rol: rol.selectedIndex,
            mail: mail.value,
            telefono: telefono.value,
            nacimiento: nacimiento.value
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
        document.getElementById('idClientesArray').value = JSON.stringify(contactos);
    }
</script> --}}
