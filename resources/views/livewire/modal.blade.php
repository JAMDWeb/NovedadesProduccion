<div >

    <x-button label="Open Modal" primary wire:click="$set('openModal', true)" />

    <x-modal.card  title="Este es un modal WireUI" blur wire:model="openModal" >

        
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime id consequatur amet odit quis, numquam
                sapiente earum harum aliquam delectus nesciunt nostrum voluptas fugiat temporibus, tenetur dolores
                distinctio? Accusantium, deserunt!</p>

            <x-slot name="footer">
                <x-button label="Cerrar" secundary wire:click="$set('openModal',false)"  />
            </x-slot>
        

    </x-modal.card>

</div>
