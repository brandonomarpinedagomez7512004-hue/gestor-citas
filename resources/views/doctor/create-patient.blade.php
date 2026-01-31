<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Registrar Nuevo Paciente </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-sm sm:rounded-lg">
                <form action="{{ route('patients.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Nombre Completo:</label>
                        <input type="text" name="nombre_completo" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Ej. Juan Pérez" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">CURP:</label>
                        <input type="text" name="curp" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="ABCD123456HDFRRR01" required>
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 font-bold mb-2">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nacimiento" class="w-full border-gray-300 rounded-md shadow-sm" required>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                            Guardar Paciente
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>