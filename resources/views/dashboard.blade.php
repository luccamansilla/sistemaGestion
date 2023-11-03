{{-- <a href="{{ route('dominio.show') }}" class="hover:underline">
        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">DOMINIOS
        </h1>
    </a>
    <a href="{{ route('cliente.show') }}" class="hover:underline">
        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">Clientes
        </h1>
    </a> --}}
<x-app-layout>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
        <!-- Sección 1 - Gráfica de Clientes -->
        <div class="bg-white p-4 rounded-md md:grid-cols-2">
            <h2 class="text-gray-500 text-lg font-semibold pb-1">Clientes</h2>
            <div class="my1-"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px  mb-6"></div>
            <!-- Línea con gradiente -->
            <div class="chart-container" style="position: relative; height:150px; width:100%">
                <!-- El canvas para la gráfica -->
                <canvas id="clientesChart"></canvas>
            </div>
        </div>

        <!-- Sección 2 - Gráfica de Dominios -->
        <div class="bg-white p-4 rounded-md">
            <h2 class="text-gray-500 text-lg font-semibold pb-1">Dominios</h2>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
            <!-- Línea con gradiente -->
            <div class="chart-container" style="position: relative; height:150px; width:100%">
                <!-- El canvas para la gráfica -->
                <canvas id="dominiosChart"></canvas>
            </div>
        </div>

        <!-- Sección 3 - Vencimientos de dominios (disminuida para dispositivos pequeños) -->
        <div class="bg-white p-4 rounded-md">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Dominios a vencer</h2>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
            <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Dominio</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Estado</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Vencimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dominios as $dom)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light">{{ $dom->nombre }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ $dom->estado }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">
                                {{ date('d/m/y', strtotime($dom->fechaVencimiento)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
            <div class="text-right mt-4">
                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                    Ver más
                </button>
            </div>
        </div>

        <!-- Sección 4 - Tabla de Clientes (disminuida para dispositivos pequeños) -->
        <div class="bg-white p-4 rounded-md mt-4">
            <h2 class="text-gray-500 text-lg font-semibold pb-4">Clientes</h2>
            <div class="my-1"></div> <!-- Espacio de separación -->
            <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div>
            <!-- Línea con gradiente -->
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="text-sm leading-normal">
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            Nombre</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">
                            CUIL</th>
                        <th
                            class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light text-right">
                            Contacto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cl)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-2 px-4 border-b border-grey-light">{{ $cl->nombre }}</td>
                            <td class="py-2 px-4 border-b border-grey-light">{{ $cl->cuil }}</td>
                            <td class="py-2 px-4 border-b border-grey-light text-right">
                                {{ $cl->telefono }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Botón "Ver más" para la tabla de Transacciones -->
            <div class="text-right mt-4">
                <button class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                    Ver más
                </button>
            </div>
        </div>
    </div>
    <!-- Script para las gráficas -->
    <script>
        // Gráfica de Usuarios
        var clientesChart = new Chart(document.getElementById('clientesChart'), {
            type: 'doughnut',
            data: {
                labels: ['Activos', 'Prospectos', 'Reposo', 'Suspendidos', 'Baja'],
                datasets: [{
                    data: [20, 20, 20, 20, 20],
                    backgroundColor: ['#1FFF00', '#FEC500', '#8B8B8D', '#0004FF', '#FF0000'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Ubicar la leyenda debajo del círculo
                }
            }
        });

        // Gráfica de Comercios
        var dominiosChart = new Chart(document.getElementById('dominiosChart'), {
            type: 'doughnut',
            data: {
                labels: ['Activos', 'Vendidos', 'En reposo', 'Baja', 'Transferidos'],
                datasets: [{
                    data: [20, 20, 20, 20, 20],
                    backgroundColor: ['#1FFF00', '#FEC500', '#8B8B8D', '#FF0000', '#0004FF'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    position: 'bottom' // Ubicar la leyenda debajo del círculo
                }
            }
        });

        // Agregar lógica para mostrar/ocultar la navegación lateral al hacer clic en el ícono de menú
        const menuBtn = document.getElementById('menuBtn');
        const sideNav = document.getElementById('sideNav');

        menuBtn.addEventListener('click', () => {
            sideNav.classList.toggle(
                'hidden'); // Agrega o quita la clase 'hidden' para mostrar u ocultar la navegación lateral
        });
    </script>

</x-app-layout>
