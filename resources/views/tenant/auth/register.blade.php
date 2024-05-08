<x-app-tenant>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-4">Registro de Usuario</h1>

        <!-- Mensaje de error si hay -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-lg">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Formulario de registro -->
        <form action="/register" method="POST" class="space-y-4">
            @csrf

            <!-- Campo de nombre -->
            <div class="space-y-2">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre:</label>
                <input type="text" name="name" id="name" class="block w-full p-2 border border-gray-300 rounded-lg" required value="{{ old('name') }}">
            </div>

            <!-- Campo de email -->
            <div class="space-y-2">
                <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="email" name="email" id="email" class="block w-full p-2 border border-gray-300 rounded-lg" required value="{{ old('email') }}">
            </div>

            <!-- Campo de contraseña -->
            <div class="space-y-2">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña:</label>
                <input type="password" name="password" id="password" class="block w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Campo de confirmación de contraseña -->
            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirma tu contraseña:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full p-2 border border-gray-300 rounded-lg" required>
            </div>

            <!-- Botón de registro -->
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-blue-700 transition">Registrar</button>
        </form>

        <!-- Enlace al formulario de inicio de sesión -->
        <p class="mt-4 text-sm text-gray-600">¿Ya tienes una cuenta? <a href="/login" class="text-blue-600 hover:underline">Inicia sesión aquí</a></p>
    </div>
</div>
</x-app-tenant>
