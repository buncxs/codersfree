<div class="container py-8 grid grid-cols-5 gap-6">
    <div class="col-span-3">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="mb-4">
                <x-label value="Nombre de Contacto" />
                <x-input type="text" placeholder="Ingrese el nombre de la persona que recibira el producto"
                    class="w-full" />
            </div>
            <div>
                <x-label value="Telefono de contacto" />
                <x-input type="text" placeholder="Ingrese un numero de telefono de contacto" class="w-full" />
            </div>
        </div>
        <div>
            <p class="mt-6 mb-3 text-lg text-gray-700 font-semibold">Envios</p>
            <label class="flex items-center bg-white rounded-lg shadow px-6 py-4 mb-4">
                <input type="radio" name="envio" class="text-gray-600">
                <span class="ml-2 text-gray-700">Recojo en tienda (Calle chiapas 9 y 10)</span>
                <span class="font-semibold text-gray-700 ml-auto">Gratis</span>
            </label>
            <label class="flex items-center bg-white rounded-lg shadow px-6 py-4">
                <input type="radio" name="envio" class="text-gray-600">
                <span class="ml-2 text-gray-700">Envio a domicilio</span>
            </label>
        </div>
        <div>
            <x-button class="mt-6 mb-4">
                Continuar con la compra
            </x-button>
            <hr>
            <p class="text-sm text-gray-700 mt-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur
                velit, neque repellat exercitationem
                vero alias ratione labore, dolores sint repellendus dolor eligendi animi est, iste quidem reprehenderit.
                Perferendis, nemo totam! <a href="" class="font-semibold text-orange-500">Politicas y
                    privacidad</a></p>
        </div>
    </div>
    <div class="col-span-2">
        <div class="bg-white rounded-lg shadow p-6">
            <ul>
                @forelse (Cart::content() as $item)
                    <!--Items Cart -->
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}" alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <div class="flex">
                                <p>Cant: {{ $item->qty }}</p>
                                @isset($item->options['size'])
                                    <p class="mx-2">{{ $item->options['size'] }}</p>
                                @endisset
                                @isset($item->options['color'])
                                    <p class="mx-2">- Color: {{ $item->options['color'] }}</p>
                                @endisset
                            </div>
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
            <hr class="mt-4 mb-3">
            <div class="text-gray-700">
                <p class="flex justify-between items-center">
                    Subtotal:
                    <span class="font-semibold">{{ Cart::subtotal() }} USD</span>
                </p>
                <p class="flex justify-between items-center">
                    Envio:
                    <span class="font-semibold">Gratis</span>
                </p>
                <hr class="mt-4 mb-3">
                <p class="flex justify-between items-center font-semibold">
                    <span class="text-lg">Total:</span>
                    {{ Cart::subtotal() }} USD
                </p>
            </div>
        </div>
    </div>
</div>
