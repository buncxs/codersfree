<div x-data>
    <p class="text-gray-700 mb-4">
        <span class="font-semibold text-lg">Stock disponible: </span>{{ $stock }}
    </p>
    <div class="flex">
        <div class="mr-4">
            <x-secondary-button disabled x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled"
                wire:target="decrement" wire:click="decrement">
                -
            </x-secondary-button>
            <span class="mx-2 text-gray-700">{{ $qty }}</span>
            <x-secondary-button x-bind:disabled="$wire.qty >= $wire.stock" wire:loading.attr="disabled"
                wire:target="increment" wire:click="increment">
                +
            </x-secondary-button>
        </div>
        <div class="flex-1">
            <x-button 
                x-bind:disabled="$wire.qty > $wire.stock"
                wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem"
                class="w-full justify-center bg-orange-500 hover:bg-orange-600 focus:bg-orange-600 active:bg-orange-800">
                agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
