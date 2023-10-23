<x-app-layout>
    <div class="md:grid md:grid-cols-1">
        <h2 class="text-4xl font-extrabold text-black pl-10">Cargar cliente</h2>
    </div>
    <form method="POST" action="" id="idFormulario">
        @csrf
        {{-- Formulario para la subida del video --}}
        <div class="bg-gray-50 flex flex-col justify-center relative overflow-hidden">
            <div class=" bg-white rounded shadow-lg p-4 ">
                <div class="text-gray-600 col-span-2 pl-14">
                    <p class="font-medium text-lg">Información del cliente</p>
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
                            <x-input type="text" name="razon" id="razon"
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
                            <x-input type="text" name="telefono" id="telefono"
                                class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                placeholder="Ingrese el nro de telefono..." />
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
