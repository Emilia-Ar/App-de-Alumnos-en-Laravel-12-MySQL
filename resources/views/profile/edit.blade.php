<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Perfil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <!-- Name -->
                        <div class="mt-4">
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Teléfono -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Teléfono (opcional)')" />
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="$user->phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Enlace profesional -->
                        <div class="mt-4">
                            <x-input-label for="professional_url" :value="__('Enlace profesional (opcional)')" />
                            <x-text-input id="professional_url" class="block mt-1 w-full" type="url" name="professional_url" :value="$user->professional_url" />
                            <x-input-error :messages="$errors->get('professional_url')" class="mt-2" />
                        </div>

                        <!-- Foto de perfil -->
                        <div class="mt-4">
                            <x-input-label for="photo" :value="__('Foto de perfil (opcional)')" />
                            <input id="photo" name="photo" type="file" class="block mt-1 w-full" accept="image/png,image/jpeg,image/jpg">
                            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
                            @if($user->photo_path)
                                <img src="{{ asset('storage/' . $user->photo_path) }}" class="w-24 h-24 rounded-full object-cover mt-2" alt="Foto actual">
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-4">
                                {{ __('Actualizar') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>