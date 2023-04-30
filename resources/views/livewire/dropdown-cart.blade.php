<div class="relative">
    <x-dropdown align="right" width="96">
        <x-slot name="trigger">
            <span class="relative block cursor-pointer">
                <x-cart size="30" />
                @if (Cart::count())
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                @else
                    <span
                        class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                @endif
            </span>

        </x-slot>

        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <!--Items Cart -->
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <p>Cant: {{ $item->qty }}</p>
                            <p>USD {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Items Cart') }}
                    </li>
                    <li class="block px-4 py-4 text-base text-center text-gray-700">
                        No tiene agregado ningun item en el carrito
                    </li>
                @endforelse
            </ul>
            @if (Cart::count())
                <div class="py-2 px-3 mt-2">
                    <p class="text-lg text-gray-700 mb-3"><span class="font-bold">Total:</span> USD
                        {{ Cart::subtotal() }}
                    </p>
                    <x-button-enlace color="orange" class="w-full justify-center cursor-pointer">
                        Ir al carrito de compras
                    </x-button-enlace>
                </div>
            @endif

        </x-slot>
    </x-dropdown>
</div>
