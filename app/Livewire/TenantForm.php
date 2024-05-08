<?php

namespace App\Livewire;

use App\Models\Tenant;
use Livewire\Component;

class TenantForm extends Component
{
    public $tenantId;
    public $domain;

    protected $rules = [
        'tenantId' => 'required|string|max:255|unique:tenants,id',
        'domain' => 'required|unique:domains,domain',
    ];

    public function createTenant()
    {
        $this->validate();

        // Crear nuevo inquilino
        $tenant = Tenant::create([
            'id' => $this->tenantId,
        ]);

        // Asignar dominio al inquilino
        $tenant->domains()->create(['domain' => $this->domain]);

        // Mostrar mensaje de éxito
        session()->flash('success', 'Inquilino creado con éxito.');

        // Restablecer campos después de la creación
        $this->tenantId = '';
        $this->domain = '';
    }

    public function render()
    {
        return view('livewire.tenant-form');
    }
}
