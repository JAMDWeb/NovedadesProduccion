<div wire:init='loadNews'>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <x-slot name="header">

        <div class="flex  justify-between">
            <div class="">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Parte de Calidad') }}

                </h2>
            </div>
            <div></div>
            {{-- <div class=" bg-slate-300 overflow-hidden shadow-xl w-48 sm:rounded-lg text-center">
                <a href="{{ route('exportformat') }}">Exportar con formato</a>
            </div> --}}
        </div>

    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

        <x-mycomponent.table>
            {{-- <div class="grid grid-cols-4 "> --}}
            <div class="flex flex-row space-x-4 ">
                {{-- <div class="px-6 py-1"> --}}
                <div class="">
                    <x-label for="">Ot</x-label>
                    {{-- <input type="text" wire:model="search_base_id" name="" id=""> --}}
                    <x-input class="border-solid border-gray-400 border-2  md:text-sm w-full" type="text"
                        wire:model="searchBaseId" placeholder="Numeró de la OT" />
                </div>

                {{-- <div class="px-6 py-1"> --}}
                <div class="">
                    <x-label for="">Fecha</x-label>
                    {{-- <input type="text" wire:model="search_base_id" name="" id=""> --}}
                    <x-input class="border-solid border-gray-400 border-2  md:text-sm w-full" type="date"
                        wire:model="searchdateinform" placeholder="Fecha de Novedad" />
                </div>

                {{-- <div class="col-span-2 px-6 py-1"> --}}
                <div class="w-96">
                    <x-label for="">Pieza</x-label>
                    {{-- <input type="text" wire:model="search_part_id" name="" id=""> --}}
                    <x-input class="border-solid border-gray-400 border-2  md:text-sm w-full " type="text"
                        wire:model="searchpartid" placeholder="Nombre de la pieza" />
                </div>
                {{-- <div class="grid grid-cols-5 "> --}}
                <div class="px-3 py-5">
                    @livewire('create-newsreport')
                </div>

                <div class="flex items-center px-2 py-2 col-start-6">
                    <span>Mostrar</span>
                    <select wire:model="cant" class="mx-2 form-control">
                        <option value="9">9</option>
                        <option value="14">14</option>
                        <option value="30">30</option>
                        <option value="60">60</option>
                        <option value="100">100</option>
                        <option value='10000'>Todos</option>
                    </select>
                    <span>Entradas</span>
                </div>

                {{-- </div> --}}

            </div>

            @if (count($news_calidad))
                {{-- Muestra tabla si existen registros --}}
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            {{-- Al seleccionar el checkbox , deberia marcar todos los checlbox de los registros --}}
                            <th scope="col" class="p-3 ">
                                <div class="flex items-center ">
                                    <input id="checkbox-all-search" type="checkbox" wire:model="selectAll"
                                        class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300
                                         rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800
                                          dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-1" wire:click="order('date_inform')">
                                Fecha
                                {{-- Sort --}}
                                @if ($sort == 'date_inform')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-1" wire:click="order('base_id')">
                                Ot
                                {{-- Sort --}}
                                @if ($sort == 'base_id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1 "></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1 "></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1 "></i>
                                @endif
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-1" wire:click="order('part_id')">
                                Articulo
                                {{-- Sort --}}
                                @if ($sort == 'part_id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th scope="col" class="cursor-pointer px-6 py-1" wire:click="order('base_id_nc')">
                                Nc
                            </th>
                            <th scope="col" class="pl-6 py-1">
                                Observaciones: Estado del proceso / operaciones
                            </th>
                            <th scope="col" class="pl-3 py-1">
                                Editar Borrar
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news_calidad as $news)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50
                                         dark:hover:bg-gray-600">
                                <td class="w-4 p-3">
                                    <div class="flex items-center">
                                        {{-- al seleccionar el checkbox , poder realizar acciones con el registro, 
                                            Como: clonar datos para nueva novedad ,  --}}
                                        <input id="checkbox-table-search-1" type="checkbox" wire:model="selectedNews"
                                            {{-- wire:click="news_clonar({{ $news->id }})" --}}
                                            wire:click="$emitTo('create-newsreport','cloneIdNews',{{ $news }} )"
                                            value={{ $news->id }}
                                            class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>

                                <th scope="row"
                                    class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ date('d-m-Y', strtotime($news->date_inform)) }}
                                </th>
                                <td class="px-10 py-1 ">
                                    {{ $news->base_id . '/' . $news->lot_id }}
                                </td>
                                <td class="px-6 py-1 whitespace-nowrap">
                                    {{ $news->part_id }}
                                </td>
                                <td class="px-6 py-1 {{ $news->base_id_nc == 1 ? 'text-red-700' : 'text-green-700' }}">
                                    {{ $news->base_id_nc == 1 ? 'Si' : 'No' }}
                                </td>
                                <td class="px-6 py-1 ">
                                    {{ $news->observacion }}
                                </td>
                                <td class="px-6 py-1 flex ">
                                    {{-- @livewire('edit-newsreport', ['news' => $news], key($news->id)) Componetes de anidamiento --}}
                                    <a class="btn btn-green ml-2" wire:click="edit({{ $news }})">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-red ml-2" wire:click="$emit('deleteNews',{{ $news->id }})">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

                @if ($news_calidad->hasPages())
                    <div class="px-6 py-1">
                        {{ $news_calidad->links() }}
                    </div>
                @else
                    {{-- En caso contrario  --}}
                @endif
            @else
                <div wire:loading.remove class="px-6 py-4">
                    {{-- No existe ningun registro coincidente --}}
                    <x-mycomponent.alert type="warning" class="mb-4">
                        <x-slot name="title">
                            Atención !.
                        </x-slot>
                        No existe ningun registro coincidente con la busqueda.

                    </x-mycomponent.alert>


                </div>
            @endif

        </x-mycomponent.table>

    </div>

    {{-- Esto remplaza la vista: edit-newsreport.blade.php  --}}
    {{-- -------------------------------------- --}}
    {{--          Editar la novedad             --}}
    {{-- -------------------------------------- --}}
    <x-dialog-modal wire:model="open_edit"> {{-- Sincronizamos con la prodiedad del componenten clase --}}

        <x-slot name='title'>
            {{-- Ot: {{ $news->base_id . '/' . $news->lot_id }} - {{ $news->part_id  }} --}}
            Editar Novedad
        </x-slot>

        <x-slot name='content'>
            <div class="flex flex-row space-x-4">
                <div class="mb-4">
                    <x-label label="Fecha" />

                    <x-input type="date" wire:model="news.date_inform" class="w-32"
                        value="{{ $this->fecha_Ymd }}" />
                    <x-input-error for='news.date_inform' />
                </div>

                <div class="mb-4">
                    <div class="w-24">
                        <x-label label="Ot" class=" " />
                        <x-input type="text" wire:model="news.base_id" />
                        <x-input-error for='news.base_id' />
                    </div>
                </div>

                <div class="mb-4">
                    <div class="h-full">
                        <x-label label="Articulo/Descipción " />
                        <div class="border-gray-300 ring-indigo-500 border rounded-md shadow-sm">
                            <x-label class="ml-2" label="{{ $this->part_id }}" />
                            <x-label class="ml-2" label="{{ $this->part_description }}" />
                        </div>

                    </div>
                </div>
            </div>

            <div class="mb-4">
                <x-label label="Observacion:  Estado del proceso"" />
                <textarea class="form-control w-full" rows="3" wire:model="news.observacion"></textarea>
                <x-input-error for='news.observacion' />

            </div>

            <div class="mb-4">
                <x-label label="NC" />
                {{-- <x-checkbox name="nc" wire:model="news.base_id_nc" /> --}}
                <x-checkbox name="nc" wire:model.defer="base_id_nc"
                    wire:click="check_nc($event.target.value)" />
                <x-input-error for='news.base_id_nc' />
            </div>
            {{-- Activa si hay NC --}}

            @if ($this->base_id_nc)
                <div class="mb-4">
                    <x-label label="Motivo NC" />
                    {{-- <textarea class="form-control w-full" rows="3" wire:model="news.motivo_nc"></textarea> --}}
                    <textarea class="form-control w-full" rows="3" wire:model.defer="news.motivo_nc"></textarea>
                    <x-input-error for='news.motivo_nc' />
                </div>
            @else
            @endif


        </x-slot>

        <x-slot name='footer'>
            <div x-data={}>
                <x-secondary-button wire:click="$set('open_edit',false)" class="mr-2">
                    Cancelar
                </x-secondary-button>

            </div>
            <div x-data={}>
                <x-danger-button wire:click="update" wire:loading.remove wire:target="update">
                    Actualizar
                </x-danger-button>
            </div>


            <span wire:loading wire:target='save'>Guardando registro....</span>
        </x-slot>


    </x-dialog-modal>


    @push('js')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            Livewire.on('deleteNews', newsId => {
                Swal.fire({
                    title: 'Esta seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, bórralo!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        Livewire.emitTo('shownewsreport', 'delete', newsId)

                        Swal.fire(
                            'Borrado!',
                            'Su registro ha sido eliminado.',
                            'success'
                        )
                    }
                })
            });
        </script>
    @endpush


</div>
