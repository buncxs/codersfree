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
    <div class="bg-white shadow-xl rounded-lg p-6">
        <table>
            <thead>
                <tr>
                    <th class="px-4 py-2 w-1/3">Color</th>
                    <th class="px-4 py-2 w-1/3">Cantidad</th>
                    <th class="px-4 py-2 w-1/3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product_colors as $product_color)
                    <tr>
                        <td class=" capitalize px-4 py-2">
                            {{ $colors->find($product_color->pivot->color_id)->name }}
                        </td>
                        <td class="px-4 py-2">
                            {{ $product_color->pivot->quantity }}
                        </td>
                        <td class="px-4 py-2 flex">
                            <x-secondary-button class="ml-auto mr-2">
                                Actualizar
                            </x-secondary-button>
                            <x-secondary-danger>
                                Eliminar
                            </x-secondary-danger>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
