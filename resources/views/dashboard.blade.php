{{-- <a href="{{ route('dominio.show') }}" class="hover:underline">
        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">DOMINIOS
        </h1>
    </a>
    <a href="{{ route('cliente.show') }}" class="hover:underline">
        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">Clientes
        </h1>
    </a> --}}
<x-app-layout>
    <!-- component -->
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            /* Agregar estilos para la vista de dispositivos pequeños */
            @media (max-width: 768px) {
                .flex-wrap {
                    display: flex;
                    flex-wrap: wrap;
                }

                .section-small {
                    width: 50%;
                }
            }
        </style>
    </head>

    <body>
        <div class="flex flex-col h-screen bg-gray-100">
            <!-- Barra de navegación superior -->
            <div class="bg-white text-white shadow w-full p-2 flex items-center justify-between">
                <div class="flex items-center">
                    <div class="hidden md:flex items-center"> <!-- Se oculta en dispositivos pequeños -->
                        {{-- <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo"
                            class="w-28 h-18 mr-2"> --}}
                        <h2 class="font-bold text-xl">Sistema de Gestion</h2>
                    </div>
                    <div class="md:hidden flex items-center"> <!-- Se muestra solo en dispositivos pequeños -->
                        <button id="menuBtn">
                            <i class="fas fa-bars text-gray-500 text-lg"></i> <!-- Ícono de menú -->
                        </button>
                    </div>
                </div>

                <!-- Ícono de Notificación y Perfil -->
                <div class="space-x-5">
                    <button>
                        <i class="fas fa-bell text-gray-500 text-lg"></i>
                    </button>
                    <!-- Botón de Perfil -->
                    <button>
                        <i class="fas fa-user text-gray-500 text-lg"></i>
                    </button>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="flex-1 flex">
                <!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
                <div class="p-2 bg-white w-60 flex flex-col hidden md:flex" id="sideNav">
                    <nav>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
                            href="{{ route('dashboard') }}">
                            <i class="fas fa-home mr-2"></i>Inicio
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
                            href="{{ route('dominio.show') }}">
                            <i class="fas fa fa-code mr-2"></i>Dominios
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
                            href="{{ route('cliente.show') }}">
                            <i class="fas fa-users mr-2"></i>Clientes
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
                            href="#">
                            <i class="fas fa-file-text mr-2"></i>Reportes
                        </a>
                        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
                            href="{{ route('profile.show') }}">
                            <i class="fas fa-user mr-2"></i>Perfil
                        </a>
                    </nav>

                    <!-- Ítem de Cerrar Sesión -->
                    <a class="block text-gray-500 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white mt-auto"
                        href="#">
                        <i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión
                    </a>

                    <!-- Señalador de ubicación -->
                    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mt-2"></div>

                    <!-- Copyright al final de la navegación lateral -->
                    <p class="mb-1 px-5 py-3 text-left text-xs text-cyan-500">KernelTech.dev</p>

                </div>

                <!-- Área de contenido principal -->
                <div class="flex-1 p-4">
                    <!-- Contenedor de las 4 secciones (disminuido para dispositivos pequeños) -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2 p-2">
                        <!-- Sección 1 - Gráfica de Usuarios (disminuida para dispositivos
            
                <!-- Sección 1 - Gráfica de Clientes -->
                        <div class="bg-white p-4 rounded-md">
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
                                                {{ $dom->fechaVencimiento }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Botón "Ver más" para la tabla de Autorizaciones Pendientes -->
                            <div class="text-right mt-4">
                                <button
                                    class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
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
                                <button
                                    class="bg-cyan-500 hover:bg-cyan-600 text-white font-semibold py-2 px-4 rounded">
                                    Ver más
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
    </body>

    </html>
</x-app-layout>
