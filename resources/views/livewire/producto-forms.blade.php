<div class="max-w-4xl mx-auto p-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Gestión de Productos</h2>

    @if ($modoEdicion)
        <h3 class="text-xl font-medium text-gray-700 mb-2">Editar Producto</h3>
    @else
        <h3 class="text-xl font-medium text-gray-700 mb-2">Crear Nuevo Producto</h3>
    @endif

    <form wire:submit.prevent="{{ $modoEdicion ? 'actualizarProducto' : 'crearProducto' }}" class="bg-white shadow-md rounded p-4 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700" for="nombre">Nombre:</label>
            <input type="text" wire:model="nombre" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="descripcion">Descripción:</label>
            <textarea wire:model="descripcion" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            @error('descripcion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="precio">Precio:</label>
            <input type="number" step="0.01" wire:model="precio" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('precio') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700" for="stock">Stock:</label>
            <input type="number" wire:model="stock" class="w-full p-2 border border-gray-300 rounded mt-1 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            @error('stock') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            {{ $modoEdicion ? 'Actualizar' : 'Crear' }}
        </button>
    </form>

    <h3 class="text-xl font-medium text-gray-700 mb-2">Lista de Productos</h3>

    <table class="w-full bg-white shadow-md rounded">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3 text-left text-gray-700">ID</th>
                <th class="p-3 text-left text-gray-700">Nombre</th>
                <th class="p-3 text-left text-gray-700">Descripción</th>
                <th class="p-3 text-left text-gray-700">Precio</th>
                <th class="p-3 text-left text-gray-700">Stock</th>
                <th class="p-3 text-left text-gray-700">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr class="border-b">
                    <td class="p-3">{{ $producto->id }}</td>
                    <td class="p-3">{{ $producto->nombre }}</td>
                    <td class="p-3">{{ $producto->descripcion }}</td>
                    <td class="p-3">{{ $producto->precio }}</td>
                    <td class="p-3">{{ $producto->stock }}</td>
                    <td class="p-3">
                        <button wire:click="editarProducto({{ $producto->id }})" class="bg-blue-600 text-white px-2 py-1 rounded hover:bg-blue-700 transition">Editar</button>
                        <button wire:click="eliminarProducto({{ $producto->id }})" class="bg-red-600 text-white px-2 py-1 rounded hover:bg-red-700 transition ml-2">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
