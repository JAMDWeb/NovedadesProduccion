<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('WireUi') }}
        </h2>
    </x-slot>

    <div class="py-2">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8"> --}}
        <x-mycomponent.container class="py-1">

            <form action="{{ route('dashboard.store') }}" method="POST">

                @csrf

                <x-card title="Carga de datos Clientes">

                    <x-slot name="action">
                        <x-button icon="plus" primary>
                            Agregar
                        </x-button>
                    </x-slot>

                    <x-errors class="mb-4" title="Por favor verifique la siguiente lista de: ({errors} errores)"
                        only="name|site|correo" />

                    <div class="flex flex-row justify-between space-x-4">
                        <div class="mb-2 basis-1/3">
                            <x-input label="Ingrese su nombre" name="name" placeholder="Ingrese un nombre"
                                hint='Informacion relevante de ingreso' corner-hint="Ejemplo" icon="user-circle"
                                right-icon="pencil" />

                        </div>
                        <div class="mb-2 w-90 basis-1/3">
                            <x-input label="Sitio web" name="site" class="pl-[4rem]" placeholder="tu-sitio-web.com"
                                prefix="http://" />
                        </div>

                        <div class="order-last">
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <x-button icon="menu" primary>
                                        Menu
                                    </x-button>
                                </x-slot>
                                <x-dropdown.header label="Partes de Producción">
                                    <x-dropdown.item icon="clipboard-document-list" label="Parte Calidad"
                                        href="{{ route('livewire_dashboard') }}" />
                                </x-dropdown.header>
                                <x-dropdown.header separator label="Pruebas Livewire">
                                    <x-dropdown.item icon="server" label="Livewere en Form"
                                        href="{{ route('form_livewire') }}" />
                                </x-dropdown.header>
                            </x-dropdown>
                        </div>
                    </div>

                    <div class="flex flex-row justify-between space-x-4">
                        <div class="mb-2 w-1/4 ">
                            <x-input label="Correo electronico" name="correo" placeholder="tu correo" suffix="@fsc.com"
                                class="" />
                        </div>
                        <div class="mb-2 w-1/4">
                            <x-inputs.password label="Contraseña" name="password" placeholder="Escriba una contraseña"
                                name='password' />
                        </div>
                        <div class="mb-2">
                            @livewire('modal')
                        </div>

                    </div>


                    <div class="flex flex-row space-x-4">
                        <div class="mb-2 w-32 ">
                            <x-input label="Codigo postal" name="cp" class="pl-14" placeholder="Cod.Postal">
                                <x-slot name="prepend">
                                    <div class="absolute inset-y-0">
                                        <x-button name="search_cp" class="h-full" icon="lock-closed" primary />
                                    </div>

                                </x-slot>
                            </x-input>
                        </div>
                        <div class="mb-2 w-32">
                            <x-inputs.number label="Edad" name="edad" />
                        </div>
                        <div class="ml-2 w-3/4">
                            <x-textarea label="Comentario" name="comentario" placeholder="Escriba su comentario"
                                rows='2' />
                        </div>
                    </div>

                    <div class="flex flex-row space-x-4">
                        <div class="mb-2">
                            <x-native-select label="Genero" name="sexo" :options="[
                                ['id' => 1, 'name' => 'Femenino'],
                                ['id' => 2, 'name' => 'Maculino'],
                                ['id' => 3, 'name' => 'No bimario'],
                            ]"
                                placeholder="Selecccione su genero" option-label="name" option-value="id" />
                        </div>
                        <div class="mb-2 ">
                            <x-select placeholder="Seleccione un país" label="Paises" name="pais" :options="[
                                [
                                    'id' => 1,
                                    'name' => 'Peru',
                                    'description' => 'abc',
                                ],
                                [
                                    'id' => 2,
                                    'name' => 'Chile',
                                    'description' => 'abc',
                                ],
                                [
                                    'id' => 3,
                                    'name' => 'Argentina',
                                    'description' => 'abc',
                                ],
                                [
                                    'name' => 'Colombia',
                                    'id' => 4,
                                    'description' => 'abc',
                                ],
                            ]"
                                option-label="name" option-value="id" />

                        </div>

                    </div>

                    <div class="mb-2 w-full  ">
                        <x-select name="parts" placeholder="Seleccione un pieza" label="Piezas" :async-data="route('api.parts.index')"
                            option-label="id" option-value="rowid" option-description="description" multiselect />

                    </div>
                    <div class="flex flex-row space-x-4">
                        <div class="mb-4 ">
                            <x-toggle label="Estado" name="estado" value="1" />

                        </div>
                        <div class="mb-4">
                            <x-icon name="chip" class="w-5 h-5" />
                        </div>
                        <div class="mb-4">
                            <x-icon name="chip" class="w-5 h-5" solid />
                        </div>
                    </div>
                    <div class="mb-2 flex flex-row space-x-2">
                        <x-checkbox left-label="Fundido" id="proc1" value="1" name="proceso[]" />
                        <x-checkbox left-label="Moldeado" id="proc2" value="2" name="proceso[]" />
                        <x-checkbox left-label="Ctrl.Dureza" id="proc3" value="3" name="proceso[]" />
                        <x-checkbox left-label="Rababado" id="proc4" value="4" name="proceso[]" />
                        <x-checkbox left-label="Camila" id="proc5" value="5" name="proceso[]" />
                        <x-checkbox left-label="Robot" id="proc6" value="6" name="proceso[]" />
                        <x-checkbox left-label="Trat.Termico" id="proc7" value="7" name="proceso[]" />
                        <x-checkbox left-label="Ctrl.Dureza post TT" id="proc8" value="8"
                            name="proceso[]" />
                        <x-checkbox left-label="Envio a Portico" id="proc9" value="9" name="proceso[]" />
                        <x-checkbox left-label="Envio a Planta 2" id="proc10" value="10" name="proceso[]" />
                    </div>

                    <div class="mb-2 flex flex-row space-x-4">

                        <x-badge flat primary label="Fundido">
                            <x-slot name="prepend" class="relative flex items-center w-2 h-2">
                                <span
                                    class="absolute inline-flex w-full h-full rounded-full opacity-75 bg-cyan-500 animate-ping"></span>
                                <span class="relative inline-flex w-2 h-2 rounded-full bg-cyan-500"></span>
                            </x-slot>
                        </x-badge>

                        <x-badge flat primary label="Moldeado">
                            <x-slot name="append" class="relative flex items-center w-2 h-2">
                                <span
                                    class="absolute inline-flex w-full h-full rounded-full opacity-75 bg-cyan-500 animate-ping"></span>
                                <span class="relative inline-flex w-2 h-2 rounded-full bg-cyan-500"></span>
                            </x-slot>
                        </x-badge>

                        <x-badge flat red label="Laravel">
                            <x-slot name="append" class="relative flex items-center w-2 h-2">
                                <button type="button">
                                    <x-icon name="search" class="w-4 h-4" />
                                </button>
                            </x-slot>
                        </x-badge>
                    </div>

                    <div class="mb-2 flex flex-row space-x-4">
                        <x-radio left-label="Aprobado" id="estado1" value="1" name="estado" />
                        <x-radio left-label="NC" id="estado2" value="2" name="estado" />

                    </div>


                    <x-slot name="footer">
                        <div class="flex flex-row space-x-4">
                            <x-button type="submit" icon="save" primary>
                                Guardar
                            </x-button>

                            {{-- Notificacion usando componente WireUi --}}
                            <x-button primary onclick="openNotification()">
                                Abrir notificacion
                            </x-button>
                            {{-- Notificacion usando componente Livewire --}}
                            @livewire('notification')

                            {{-- Notificacion usando componente WireUi --}}
                            <x-button primary onclick="openDialog()">
                                Abrir dialogo
                            </x-button>

                            {{-- Notificacion usando componente Livewire --}}
                            @livewire('dialog')

                        </div>
                    </x-slot>
                </x-card>

                <div class="mt-2">
                    <x-card class="bg-slate-200">
                        <p>Segunda tarjeta</p>
                    </x-card>
                </div>

            </form>



        </x-mycomponent.container>
    </div>

    @push('js')
        <script>
            function openNotification() {

                window.$wireui.notify({
                    'title': 'Notificacion',
                    'description': 'Esta es una notificacion de Wireui',
                    'icon': 'info' /* error , info, success   */
                });

            }

            function openDialog() {
                window.$wireui.dialog({
                    'title': 'Dialogo',
                    'description': 'Esto es un notificacion tipo Dialogo de Wireui',
                    'icon': 'info',
                });

            }
        </script>
    @endpush
</x-app-layout>
