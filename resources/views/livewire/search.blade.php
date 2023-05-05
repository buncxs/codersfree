<div class="flex-1 relative" x-data>
    <form action="{{ route('search') }}" class="flex" autocomplete="off">
        <x-input name="name" wire:model="search" type="text" class="w-full"
            placeholder="Estas buscando algun producto?" />
        <button class="flex self-stretch justify-center items-center bg-my-red -ml-1 w-12 rounded-r-md">
            <x-magnifying />
        </button>
    </form>
    <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{ route('products.show', $product) }}" class="flex">
                        <img class="w-16 h-12 object-cover" src="{{ Storage::url($product->images->first()->url) }}"
                            alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{ $product->name }}</p>
                            <p class="">Categoria: {{ $product->subcategory->category->name }}</p>
                        </div>
                    </a>
                @empty
                    <div class="ml-4 text-gray-700">
                        <p class="text-lg leading-5">
                            No existe ningun registro con los parametros especificados
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
