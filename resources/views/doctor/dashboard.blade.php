<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-600 leading-tight">
            {{ __('Panel Médico - ClickDoc') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-500">
                    <h3 class="font-bold text-gray-700 text-lg">Reportes Mensuales</h3>
                    <p class="text-sm text-gray-500 mt-2">Descarga tus estadísticas en PDF, Excel o Word.</p>
                    <a href="{{ route('doctor.reportes') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Ir a Reportes</a>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-green-500">
                    <h3 class="font-bold text-gray-700 text-lg">Mis Pacientes</h3>
                    <p class="text-sm text-gray-500 mt-2 mb-4">Gestiona expedientes y sube documentos.</p>
                    
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('patients.create') }}" class="text-center bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition">
                            + Registrar Nuevo Paciente
                        </a>
                        <button class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200">
                            <a href="{{ route('patients.index') }}" class="bg-gray-100 text-gray-700 px-4 py-2 rounded hover:bg-gray-200 text-center block">
    Ver Lista Completa
</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>