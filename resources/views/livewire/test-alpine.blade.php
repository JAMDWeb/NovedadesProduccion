<div>

    <p class="ml-2 mb-2">Count: {{ $count }}</p>

    <button wire:click="incrementar"  class="btn btn-blue ml-2">
        Aumentar desde Livewire
    </button>
   
    {{-- <div x-data="{ count: $wire.count }" class="ml-2" > --}} {{-- Actualiza solo count de alpine --}}
    {{-- <div x-data="{ count: @entangle('count') }" class="ml-2" > {{-- Actualiza la propiedad del controlador : count  --}}
    <div x-data="{ count: @entangle('count').defer }" class="ml-2" >
        <p class="mb-2">Count dentro de Alpine <span x-text="count" ></span></p>

        <button @click="count++" class="btn btn-blue">
            Aumentar desde Alpine
        </button>
    </div>

</div>