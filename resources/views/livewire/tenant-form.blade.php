<div class="max-w-md mx-auto mt-8">
    <form wire:submit.prevent="createTenant" class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-4">
            <label for="tenantId" class="block text-sm font-medium text-gray-700">Identificador del inquilino:</label>
            <input type="text" id="tenantId" wire:model="tenantId"
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
            @error('tenantId')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label for="domain" class="block text-sm font-medium text-gray-700">Dominio:</label>
            <input type="text" id="domain" wire:model="domain"
                class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500 focus:outline-none">
            @error('domain')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-indigo-600">Crear
            inquilino</button>
    </form>

    @if (session()->has('success'))
        <div class="alert bg-green-500 mt-4 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

</div>
