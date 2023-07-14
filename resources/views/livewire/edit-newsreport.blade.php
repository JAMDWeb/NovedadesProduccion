

{{-- Esto se reemplazo en el show-news-reports.blade : no se utiliza mas  --}}
<div>
    {{-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a> --}}
    <a class="btn btn-green" wire:click="$set('open',true)">
        <i class="fas fa-edit"></i>
    </a>

    <x-dialog-modal wire:model="open"> {{-- Sincronizamos con la prodiedad del componenten clase --}}

        <x-slot name='title'>
            {{-- Ot: {{ $news->workorder_base_id . '/' . $news->workorder_lot_id }} - {{ $news->part_id  }} --}}
            Editar Novedad
        </x-slot>

        <x-slot name='content'>

            <div class="mb-4">
                <x-label value="Fecha" />
                {{-- con wire-model.defer np sincronizamos las propiedasdes del componente 
                    para que no este constantemente actualizando --}}
                {{-- <x-input type="date" wire:model.defer="date_inform" />  --}}
                <x-input type="date" wire:model.defer="news.date_inform" value="$news->date_inform" />
                <x-input-error for='news.date_inform' />
                {{-- @error('date_inform')
                    <span>
                        {{ $message }}
                    </span>
                @enderror --}}

            </div>

            <div class="flex">
                <div class="w-1/3 mb-4">
                    <x-label value="Cod. Base" class=" " />
                    <x-input type="text" wire:model.defer="news.workorder_base_id" />
                    <x-input-error for='news.workorder_base_id' />

                </div>

                {{-- <div class="w-1/3 mb-4">
                    <x-label value="Cod. Lote" />
                    <x-input type="text" wire:model.defer="news.workorder_lot_id" />
                    <x-input-error for='news.workorder_lot_id' />

                </div> --}}
            </div>

            <div class="mb-4">
                <x-label value="Ot" />
                <x-input type="text" class="w-full" wire:model.defer="news.part_id" />
                <x-input-error for='news.part_id' />
            </div>
            
            {{-- <div class="mb-4">
                <x-label value="Turno" />
                <x-input type="text" wire:model.defer="news.turno" />
                <x-input-error for='news.turno' />
            </div>

            <div class="mb-4">
                <x-label value="Estado" />
                <x-input type="text" wire:model.defer="news.estado" />
                <x-input-error for='news.estado' />
            </div> --}}

            <div class="mb-4">
                <x-label value="Observacion : Estado del proceso" />
                <textarea class="form-control w-full" rows="3" wire:model.defer="news.observacion"></textarea>
                <x-input-error for='news.observacion' />

            </div>

            {{-- Activa si hay NC --}}
            <div class="mb-4">
                <x-label value="NC" />
                <x-checkbox name="nc" wire:model.defer="news.base_id_nc" />
                <x-input-error for='news.base_id_nc' />
            </div>
            
            <div class="mb-4">
                <x-label value="Motivo NC" />
                <textarea class="form-control w-full" rows="3" wire:model.defer="news.motivo_nc"></textarea>
                <x-input-error for='news.motivo_nc' />
            </div>

        </x-slot>

        <x-slot name='footer'>

            <x-secondary-button wire:click="$set('open',false)" class="mr-2">
                Cancelar
            </x-secondary-button>

            {{-- No esta funcionando el parametro  wire:loading.attr="disabled" y  wire:loading.class="bg-blue-500" c
                con los componenteas x-button y x-danger-button , y si se agrega las clases a button tampoc funciona   --}}

            {{-- Miendras dure el proceso 'save'( wire:target='save') se oculta el boton Guardar con la propiedad  wire:loading.remove --}}
            {{-- <x-danger-button  wire:click="save" wire:loading.attr="disabled" wire:target="save"> --}}
            {{-- <x-danger-button class="ml-2" wire:click="save" wire:loading.class  wire:target='save'> --}}
            <x-danger-button wire:click="save" wire:loading.remove wire:target="save">
                Actualizar
            </x-danger-button>

            {{-- <button
                class='inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150''
                wire:click="save" wire:loading.class="bg-blue-500" wire:target='save'>
                Guardar
            </button> --}}

            {{-- Mensaje solo cuando se esta produciendo le proceso de Guardar --}}
            {{-- Por default asigna un display inlineblock
                Se podria asiganr wire:loading.flex, wire:loading.grid, wire:loading.inline, wire:loading.table --}}
            <span wire:loading wire:target='save'>Guardando registro....</span>
        </x-slot>


    </x-dialog-modal>

</div>
