<div x-data>
    <div>
        <p class="text-xl text-gray-700">
            Talla:
        </p>
        <select wire:model="size_id" class="form-control w-full">
            <option value="" selected disabled>Seleccione una talla</option>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="mt-2">
        <p class="text-xl text-gray-700">
            Color:
        </p>
        <select wire:model="color_id" class="form-control w-full">
            <option value="" selected disabled>Seleccione un color</option>
            @foreach ($colors as $color)
                <option value="{{ $color->id }}">{{ $color->name }}</option>
            @endforeach
        </select>
    </div>
    <p class="text-gray-700 my-4">
        <span class="font-semibold text-lg">Stock disponible: </span>
        @if ($stock)
            {{$stock}}
        @else
            {{ $product->stock }}
        @endif
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
            <x-button wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem"
                x-bind:disabled="!$wire.stock" class="w-full justify-center" color="orange">
                agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
