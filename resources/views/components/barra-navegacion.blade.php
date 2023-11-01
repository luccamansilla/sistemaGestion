<!-- Barra lateral de navegación (oculta en dispositivos pequeños) -->
<div class="p-2 bg-white w-60 flex flex-col hidden md:flex" id="sideNav">
    <nav>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
            href="{{ route('dashboard') }}">
            <i class="fas fa-home mr-2"></i>Inicio
        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
            href="{{ route('dominio.show') }}">
            <i class="fas fa-file-alt mr-2"></i>Dominios
        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
            href="{{ route('cliente.show') }}">
            <i class="fas fa-users mr-2"></i>Clientes
        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
            href="#">
            <i class="fas fa-store mr-2"></i>Perfil
        </a>
        <a class="block text-gray-500 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white"
            href="#">
            <i class="fas fa-exchange-alt mr-2"></i>Reportes
        </a>
    </nav>

    <!-- Ítem de Cerrar Sesión -->
    <a class="block text-gray-500 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r hover:from-cyan-400 hover:to-cyan-300 hover:text-white mt-auto"
        href="#">
        <i class="fas fa-sign-out-alt mr-2"></i>Cerrar sesión
    </a>

    <!-- Señalador de ubicación -->
    <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mt-2"></div>

    <p class="mb-1 px-5 py-3 text-left text-xs text-cyan-500">Sistema de Gestion - KernelTech.dev</p>

</div>
