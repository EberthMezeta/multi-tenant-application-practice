<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class ProductoForm extends Component
{
    public $productos;
    public $productoId;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $modoEdicion = false;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric',
        'stock' => 'required|integer',
    ];

    public function render()
    {
        $this->productos = Producto::all();
        return view('livewire.producto-form');
    }

    public function crearProducto()
    {
        $this->validate();

        Producto::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);

        // Limpiar campos después de crear el producto
        $this->limpiarCampos();
    }

    public function editarProducto($id)
    {
        $producto = Producto::findOrFail($id);
        $this->productoId = $producto->id;
        $this->nombre = $producto->nombre;
        $this->descripcion = $producto->descripcion;
        $this->precio = $producto->precio;
        $this->stock = $producto->stock;

        $this->modoEdicion = true;
    }

    public function actualizarProducto()
    {
        $this->validate();

        $producto = Producto::findOrFail($this->productoId);
        $producto->update([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'precio' => $this->precio,
            'stock' => $this->stock,
        ]);

        // Salir del modo de edición y limpiar campos
        $this->modoEdicion = false;
        $this->limpiarCampos();
    }

    public function eliminarProducto($id)
    {
        Producto::destroy($id);
    }

    private function limpiarCampos()
    {
        $this->productoId = null;
        $this->nombre = '';
        $this->descripcion = '';
        $this->precio = '';
        $this->stock = '';
        $this->modoEdicion = false;
    }
}
