<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('¿Olvidate tu Password? Coloca tu Email de registro y enviaremos un enlace para que puedas entrar a tu cuenta') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" novalidate>
        @csrf

        <!-- Field Error -->
        <div class="mb-2">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            
        </div>

        <x-primary-button class="w-full justify-center mt-4">
            {{ __('Enviar Instrucciones') }}
        </x-primary-button>

        <div class="flex justify-between my-5">
            <x-link :href="route('login')">
                Iniciar Sesión
            </x-link>
            <x-link :href="route('register')">
                Crear Cuenta
            </x-link>
        </div>
    </form>
</x-guest-layout>
