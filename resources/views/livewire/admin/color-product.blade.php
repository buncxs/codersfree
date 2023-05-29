<div>
    <div class="bg-white shadow-xl rounded-lg p-6 my-12">
        <!-- Color -->
        <div class="mb-6">
            <x-label>
                Color
            </x-label>
            <div class="grid grid-cols-6 gap-6">
                @foreach ($colors as $color)
                    <label>
                        <input type="radio" name="color_id" wire:model.defer="color_id" value="{{ $color->id }}">
                        <span class="ml-2 text-gray-700 capitalize">
                            {{ __($color->name) }}
                        </span>
                    </label>
                @endforeach
            </div>
            <x-input-error for="color_id" />
        </div>
        <!-- Quantity -->
        <div class="mb-6">
            <x-label>
                Cantidad
            </x-label>
            <x-input type="number" wire:model.defer="quantity" placeholder="Ingrese una cantidad" class="w-full" />
            <x-input-error for="quantity" />
        </div>
        <div class="flex justify-end items-center">
            <x-action-message class="mr-3" on="saved">
                Agregado
            </x-action-message>
            <x-button class="" wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar
            </x-button>
        </div>
    </div>
    
</div>
