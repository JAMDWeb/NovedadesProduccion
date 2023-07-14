@php
    
    $fecha_news = date('');
    
@endphp
{{-- Componente : CreateNewsreport.php  --}}
<div>
    {{-- Se prodria crear un metodo en el compomente 
        En este caso es algo simple , asi que se podra utilizaar un metodo magico --}}
   
    <x-danger-button wire:click="$set('open', true)">
        Crear Novedad
    </x-danger-button>
    <x-dialog-modal wire:model="open" >
        
        <x-slot name='title'>
            Crear Novedad
            @if (!empty($this->clonar))
                <span>Clonando desde Ot: {{ $this->clonar['base_id'] }} </span>
            @endif
        </x-slot>

        <x-slot name='content'>

            <div class="flex flex-row space-x-4">
                <x-label label="Fecha" />
       
                <x-input type="date" wire:model.defer="date_inform" value="{{ $this->date_inform }}" />
  
                <x-input-error for='date_inform' />
  
            </div>

            <div class="flex">
                <div class="mb-4">
                    <x-label label="Ot" class=" " />
                    <x-input type="text" wire:model.defer="base_id"
                        wire:keydown.enter="add_part_id($event.target.value)" />
                    <x-input-error for='base_id' />

                </div>
            </div>
            @if ($base_id_ok or !empty($this->clonar))

                <div class="">
                    <div class="mb-4">
                        <x-label Label="Articulo/Descipción " />
                        <div class="w-full border-gray-300 ring-indigo-500 border rounded-md shadow-sm">
                            <x-label class="ml-2" label="{{ $this->part_id }}" />
                            <x-label class="ml-2" label="{{ $this->part_description }}" />
                        </div>
                    </div>
                </div>
    
                <div class="mb-4">
                    <x-label label="Observacion: Estado del proceso" />
                    <textarea class="form-control w-full" rows="3" wire:model.defer="observacion"></textarea>
                    <x-input-error for='observacion' />

                </div>
          
                <div class="mb-4">
                    <x-label label="NC" />
                    <x-checkbox name="nc" wire:model.defer="base_id_nc"
                        wire:click="check_nc($event.target.value)" />
                </div>

                {{-- Activa si hay NC --}}
                @if ($base_id_nc or !empty($this->clonar))
                    <div class="mb-4">
                        <x-label label="Motivo NC" />
                        <textarea class="form-control w-full" rows="3" wire:model.defer="motivo_nc"></textarea>
                    </div>
                @endif
            @endif
        </x-slot>

        <x-slot name='footer'>
            @if ($base_id_ok or !empty($this->clonar))
                <x-secondary-button wire:click="exit_modal" class="mr-2">
                    Cancelar
                </x-secondary-button>

                <x-danger-button wire:click="save" wire:loading.remove wire:target="save">
                    Guardar
                </x-danger-button>

                <span wire:loading wire:target='save'>Guardando registro....</span>
            @endif
        </x-slot>
    </x-dialog-modal>

</div>
