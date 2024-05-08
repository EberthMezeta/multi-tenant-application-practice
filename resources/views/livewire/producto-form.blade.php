<div>
    <h2>Gestión de Productos</h2>

    @if ($modoEdicion)
        <h3>Editar Producto</h3>
    @else
        <h3>Crear Nuevo Producto</h3>
    @endif

    <form wire:submit.prevent="{{ $modoEdicion ? 'actualizarProducto' : 'crearProducto' }}">
        <div>
            <label>Nombre:</label>
            <input type="text" wire:model="nombre">
            @error('nombre') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Descripción:</label>
            <textarea wire:model="descripcion"></textarea>
            @error('descripcion') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Precio:</label>
            <input type="number" step="0.01" wire:model="precio">
            @error('precio') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div>
            <label>Stock:</label>
            <input type="number" wire:model="stock">
            @error('stock') <span class="error">{{ $message }}</span> @enderror
        </div>
        <button type="submit">{{ $modoEdicion ? 'Actualizar' : 'Crear' }}</button>
    </form>

    <h3>Lista de Productos</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <button wire:click="editarProducto({{ $producto->id }})">Editar</button>
                        <button wire:click="eliminarProducto({{ $producto->id }})">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
