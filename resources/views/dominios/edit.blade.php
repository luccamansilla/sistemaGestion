@vite(['resources/js/editarDominio.js'])
<x-app-layout>
    <form method="POST" action="{{ route('dominio.update', $dominio) }}" id="idFormulario">
        {{-- {{ route('dominio.store') --}}
        @csrf
        <div class="bg-gray-50 flex flex-col justify-center relative overflow-hidden">
            <div class=" bg-white rounded shadow-lg p-4 ">
                <div class="grid  text-sm grid-cols-1 lg:grid-cols-2">
                    <div class="text-gray-600 col-span-2 pl-6 pb-4">
                        <p class="font-medium text-4xl">MODIFICAR DOMINIO</p>
                        <p>Todos los campos son necesarios.</p>
                    </div>
                    <div class="lg:col-span-2">
                        <div class="grid gap-2 gap-y-1 text-sm grid-cols-1 md:grid-cols-5">
                            <div class="md:col-span-5">
                                {{-- VALORES QUE VIENEN DEL DOMINIO --}}
                                <x-input type="hidden" id="titularGet" value="{{ $dominio->titular_id }}"></x-input>
                                <x-input type="hidden" id="dueñoGet" value="{{ $dominio->dueño_id }}"></x-input>
                                <x-input type="hidden" id="clienteGet" value="{{ $dominio->cliente_id }}"></x-input>
                                <x-input type="hidden" id="estadoGet" value="{{ $dominio->estado }}"></x-input>
                                {{--  --}}
                                <x-label for="nombre">Nombre del dominio</x-label>
                                <x-input type="text" name="nombre" id="nombre"
                                    class="h-10 border mt-1 rounded px-4 w-full bg-gray-50"
                                    placeholder="Ingrese el nombre del dominio" value="{{ $dominio->nombre }}" />
                                <div class="md:col-span-3 md:row-span-3">
                                    <x-label for="observaciones">Observaciones</x-label>
                                    <textarea name="observaciones" id="observaciones"
                                        class="border-gray-300 h-20 border mt-1 rounded px-4 w-full bg-gray-50" value=""
                                        placeholder="Ingrese las observaciones del dominio">{{ $dominio->observaciones }}</textarea>
                                    <span id="error-descripcion" class="text-red-500"></span>

                                </div>
                                <div class="grid grid-cols-3">
                                    <div class="col-span-1 md:row-span-3 justify-center place-items-center">
                                        <x-label for="cliente">Seleccione el cliente</x-label>
                                        <select name="cliente" id="idCliente" class="rounded-lg border-gray-300">
                                            <option value="0">--Seleccione el cliente--</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}
                                                    - {{ $cliente->dni }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-1 md:row-span-3 justify-center place-items-center">
                                        <x-label for="dueño">Seleccione el dueño</x-label>
                                        <select name="dueño" id="idDueño" class="rounded-lg border-gray-300">
                                            <option value="0">--Seleccione el dueño--</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-1 md:row-span-3 justify-center place-items-center">
                                        <x-label for="titular">Seleccione el titular</x-label>
                                        <select name="titular" id="idTitular" class="rounded-lg border-gray-300">
                                            <option value="0">--Seleccione el titular--</option>
                                            @foreach ($clientes as $cliente)
                                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-3">
                                    <div class="col-span-1 md:row-span-3 justify-center place-items-center">
                                        <x-label for="estado">Estado del domino</x-label>
                                        <select name="estado" id="idEstado" class="rounded-lg border-gray-300">
                                            <option value="ACTIVO">ACTIVO</option>
                                            <option value="EN REPOSO">EN REPOSO</option>
                                            <option value="BAJA PERMANENTE">BAJA PERMANENTE</option>
                                            <option value="TRANSFERIDO">TRANSFERIDO</option>
                                            <option value="VENCIDO">VENCIDO</option>

                                        </select>
                                    </div>
                                    <div class="col-span-1">
                                        <x-label for="Registro">Fecha del registro</x-label>
                                        <x-input type="date" name="registro" id="idRegistro"
                                            class="h-10 border mt-1 rounded px-4 w-44 bg-gray-50"
                                            value="{{ $dominio->fechaRegistro }}" />
                                    </div>
                                    <div class="col-span-1">
                                        <x-label for="Vencimiento">Fecha de vencimiento</x-label>
                                        <x-input type="date" name="vencimiento" id="idVencimiento"
                                            class="h-10 border mt-1 rounded px-4 w-44 bg-gray-50"
                                            value="{{ $dominio->fechaVencimiento }}" />
                                    </div>
                                </div>
                                <div class="md:col-span-5 text-right">
                                    <div class="inline-flex items-end">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Modificar
                                            dominio</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</x-app-layout>
