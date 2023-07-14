<div class="">
    <div class="mb4">
        <x-inputs.maskable label="Numero de telefono" placeholder="Ingrese un numero de telefono"
            mask="['(+##) ####-####','(+###) ####-####']" class="w-96" />

    </div>
    <div class="mb4 w-40">
        <x-datetime-picker 
        label="Fecha"
        without-time
        placeholder="Ingrese la fecha"
        :min="now()->subDays(7)->format('Y-m-d')"
        :max="now()->addDays(7)->format('Y-m-d')"

        />
        
    </div>
    <div class="mb4 w-36">
        <x-time-picker 
        label="Hora"
        placeholder="Ingrese la hora"
        format="24"
        interval="30"


        />
        
    </div>

</div>
        {{-- no funciona 
        <x-inputs.currency 
            label= "Moneda"
            presicion="3" /> --}}