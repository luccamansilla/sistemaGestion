<x-app-layout>
    {{-- Dashboar que trae jetstream
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
        
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> 
    --}}
    {{-- <form method="POST" action="{{ route('video.update', $video) }}" >
        <x-button>Dominios</x-button>
    </form> --}}
    <a href="{{ route('dominio.show') }}" class="hover:underline">
        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">DOMINIOS
        </h1>
    </a>
    <a href="{{ route('cliente.show') }}" class="hover:underline">
        <h1 class="mt-4 text-gray-800 text-2xl font-bold cursor-pointer">Clientes
        </h1>
    </a>
</x-app-layout>
