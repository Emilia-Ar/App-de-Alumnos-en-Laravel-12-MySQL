<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mi Perfil
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
                                @php
                                    $prefix = config('contact.whatsapp_prefix', '54');
                                    $digits = preg_replace('/\D/', '', $user->phone);
                                @endphp
                                <p class="mt-1">
                                    Teléfono: <a class="text-blue-600 underline" target="_blank" rel="noopener noreferrer" href="https://wa.me/{{ $prefix . $digits }}">{{ $user->phone }}</a>
                                </p>
                            @endif
                            @if($user->professional_url)
                                <p class="mt-1">
                                    Enlace profesional: <a class="text-blue-600 underline" target="_blank" rel="noopener noreferrer" href="{{ $user->professional_url }}">{{ $user->professional_url }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Editar Perfil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>