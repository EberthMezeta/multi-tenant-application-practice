<x-app-tenant>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Iniciar Sesión</h1>

        <!-- Mensaje de error si hay -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-800 p-4 mb-4 rounded-lg">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Formulario de inicio de sesión -->
        <form action="/login" method="POST" class="space-y-4">
            @csrf

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

            <!-- Botón de inicio de sesión -->
            <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-blue-700 transition">Iniciar Sesión</button>
        </form>

        <!-- Enlace al formulario de registro -->
        <p class="mt-4 text-sm text-gray-600">¿No tienes una cuenta? <a href="/register" class="text-blue-600 hover:underline">Regístrate aquí</a></p>
    </div>
</x-app-tenant>
