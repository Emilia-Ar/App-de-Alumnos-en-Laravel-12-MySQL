<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle de Usuario: {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex items-center gap-6">
                        <img src="{{ $user->photo_path ? asset('storage/' . $user->photo_path) : asset('images/default.png') }}" class="w-24 h-24 rounded-full object-cover" alt="Foto de perfil">
                        <div>
                            <p class="text-lg font-semibold">{{ $user->name }}</p>
                            <p class="text-gray-600">{{ $user->email }}</p>
                            @if($user->phone)
                                <p class="mt-1">Teléfono: {{ $user->phone }} ( <a class="text-blue-600 underline" target="_blank" rel="noopener noreferrer" href="{{ $user->whatsapp_url }}">Contactar por WhatsApp</a> )</p>
                            @endif
                            @if($user->professional_url)
                                <p class="mt-1">Enlace profesional: <a class="text-blue-600 underline" target="_blank" rel="noopener noreferrer" href="{{ $user->professional_url }}">{{ $user->professional_url }}</a></p>
                            @endif
                            <p class="mt-1">Rol: {{ $user->is_admin ? 'Administrador/Docente' : 'Alumno' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>