@vite(['resources/js/editarCliente.js']);
<x-app-layout>
    <form method="POST" action="" id="idFormulario">
        @csrf
        <div class="bg-gray-50 flex flex-col justify-center relative overflow-hidden  w-full">
            <div class=" bg-white rounded shadow-lg p-4">
                <div class="text-gray-600 col-span-2 pl-6">
                    <p class="font-medium text-4xl">MODIFICAR CLIENTE</p>
                </div>
                <div class="grid grid-cols-2">
                    <div class="grid-cols-1 px-4">
                        <x-label for="nombre">Nombre del cliente</x-label>
                        <x-input type="text" name="nombre" id="nombre"
                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                            placeholder="Ingrese el nombre del dominio" value="{{ $cliente->nombre }}" />
                    </div>
                    <div class="grid-cols-1 px-4">
                        <x-label for="razonSocial">Razon social</x-label>
                        <x-input type="text" name="razonSocial" id="razonSocial"
                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                            placeholder="Ingrese la razon social..." value="{{ $cliente->razonSocial }}" />
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="grid-cols-1 px-4">
                        <x-label for="email">Email</x-label>
                        <x-input type="text" name="email" id="email"
                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingrese el e-mail..."
                            value="{{ $cliente->email }}" />
                    </div>
                    <div class="grid-cols-1 px-4">
                        <x-label for="dni">DNI</x-label>
                        <x-input type="number" name="dni" id="dni"
                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingrese el DNI..."
                            value="{{ $cliente->dni }}" />
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="grid-cols-1 px-4">
                        <x-label for="cuil">CUIL</x-label>
                        <x-input type="text" name="cuil" id="cuil"
                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50" placeholder="Ingrese el CUIL..."
                            value="{{ $cliente->cuil }}" />
                    </div>
                    <div class="grid-cols-1 px-4">
                        <x-label for="telefono">Telefono de contacto.</x-label>
                        <x-input type="number" name="telefono" id="telefono"
                            class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                            placeholder="Ingrese el nro de telefono..." value="{{ $cliente->telefono }}" />
                    </div>
                </div>
                <div class="grid grid-cols-2">
                    <div class="col-span-2 md:row-span-3 justify-center place-items-center px-4">
                        <x-label for="estado">Estado del cliente</x-label>
                        <input type="hidden" id="estadoSeleccionado" value="{{ $cliente->estado }}">
                        <select name="estado" id="idEstado" class="rounded-lg">
                            <option value="ACTIVO" id="ACTIVO">ACTIVO</option>
                            <option value="PROSPECTO" id="PROSPECTO">PROSPECTO</option>
                            <option value="BAJA PERMANENTE" id="BAJA PERMANENTE">BAJA PERMANENTE</option>
                            <option value="CUENTA SUSPENDIDA" id="CUENTA SUSPENDIDA">CUENTA SUSPENDIDA</option>
                        </select>
                    </div>
                    <div class="col-span-2 md:row-span-3 justify-center place-items-center px-4 hidden">
                        <x-input type="hidden" name="clientesArray" id="idClientesArray"></x-input>
                    </div>
                </div>
                <div class="px-4"name="contactos">
                    <x-label for="contactos" class="text-xl">Contactos del cliente</x-label>
                    @if ($contactos->count())


                        <table class="min-w-col bg-gray-300 min-w-full">
                            <thead class="border-b text-center">
                                <tr>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        Nombre
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        Rol
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        E-mail
                                    </th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-center">
                                        Modificar
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-center bg-white">
                                @foreach ($contactos as $contacto)
                                    <tr class="bg-gray-100 border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            {{ $contacto->nombre }}</td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $contacto->rol->rol }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            {{ $contacto->mail }}
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                            <a onclick="editarContacto({{ $contacto }}, {{ $cliente->id }})"><x-buttonClassic>Editar
                                                    Contacto</x-buttonClassic></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <span class="text-lg">No se registraron contactos.</span>
                    @endif
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
    </form>
</x-app-layout>
{{-- MODAL --}}
<div id="modal_overlay"
    class="hidden absolute inset-0 bg-black bg-opacity-30  w-full justify-center items-start md:items-center pt-10 md:pt-0">
    {{-- modal --}}
    <div id="modal"
        class="opacity-0 transform -translate-y-full scale-150  relative w-10/12 md:w-1/2 h-1/2 md:h-3/4 bg-white rounded shadow-lg transition-opacity transition-transform duration-300">
        <form action="{{ route('contacto.update') }}" method="POST" id="idFormContacto">
            @csrf
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
            <x-input type="hidden" name="idCliente" id="idCliente" class="grid-cols-1"></x-input>
            <div class="w-full p-3 grid grid-cols-2">
                {{-- col span 3 --}}

                <div class="grid-cols-1">
                    <x-label for="nombreCliente">Nombre</x-label>
                    <x-input name="nombreCliente" id="nombreCliente" class="grid-cols-3"></x-input>
                </div>
                <div class="grid-cols-1">
                    <x-label for="rolCliente">Rol</x-label>
                    <select name="rolCliente" id="idRol" class="grid-cols-1 border-gray-300 rounded-lg w-52">
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}" id="rol{{ $rol->id }}">{{ $rol->rol }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="grid-cols-1">
                    <x-label for="apellidoCliente">Apellido</x-label>
                    <x-input name="apellidoCliente" id="apellidoCliente" class="grid-cols-1"></x-input>
                </div>
                <div class="grid-cols-1">
                    <x-label for="mailCliente">Mail</x-label>
                    <x-input name="mailCliente" id="mailCliente"></x-input>
                </div>
                <div class="grid-cols-1">
                    <x-label for="telefonoCliente">Telefono</x-label>
                    <x-input type="number" id="telefonoCliente" name="telefonoCliente"></x-input>
                </div>
                <div class="grid-cols-1">
                    <x-label for="nacimientoCliente">Fecha de Nacimiento</x-label>
                    <x-input type="date" id="nacimientoCliente" name="nacimientoCliente"></x-input>
                </div>
            </div>
            <x-input type="hidden" name="idContacto" id="idContacto"></x-input>
            {{-- Boton cerrar --}}
            <div
                class="absolute bottom-0 left-0 px-4 py-3 border-t border-gray-200 w-full flex justify-end items-center gap-3">
                <x-buttonClassic type="submit">Guardar Contacto</x-buttonClassic>
                <x-buttonClassic type="button" onclick="openModal(false)">Cerrar</x-buttonClassic>
            </div>
        </form>
    </div>
</div>
