<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{url('/')}}">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf


            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Name -->
            <div>
                <x-label for="nombre" :value="__('Nombre')" />

                <x-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')" required autofocus />
            </div>

            <div>
                <x-label for="apellido" :value="__('Apellido')" />

                <x-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" :value="old('apellido')" required autofocus />
            </div>

            <div>
                <x-label for="direccion" :value="__('Direccion')" />

                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="old('direccion')" required autofocus />
            </div>

            <div>
                <x-label for="ciudad" :value="__('Ciudad')" />

                <x-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" :value="old('name')" required autofocus />
            </div>

            <div>
                <x-label for="telefono" :value="__('Teléfono')" />

                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="old('telefono')" required autofocus />
            </div>


            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Tienes una cuenta?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Registrarme') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
