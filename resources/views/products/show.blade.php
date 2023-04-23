<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            <div>
                <!-- slider -->
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb="{{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url) }}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold text-neutral-700">
                    {{ $product->name }}
                </h1>
                <div class="flex">
                    <p class="text-neutral-700">Marca:
                        <a class="underline capitalize hover:text-orange-500" href="">
                            {{ $product->brand->name }}
                        </a>
                    </p>
                    <p class="text-neutral-700 mx-6">
                        5 <i class="fas fa-star text-sm text-yellow-400"></i>
                    </p>
                    <a class="text-orange-500 hover:text-orange-700 underline " href="">
                        39 reseñas
                    </a>
                </div>
                <p class="text-2xl font-semibold text-neutral-700 my-4">
                    USD {{ $product->price }}
                </p>
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-lime-600">
                            <i class="fas fa-truck text-sm text-white"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-lg font-semibold text-lime-600">
                                Se hacen envios a todo Mexico
                            </p>
                            <p>
                                Recibelo el <span
                                    class="text-lime-600">{{ Date::now()->addDay(7)->locale('es')->format('l j F') }}</span>
                            </p>
                        </div>
                    </div>
                </div>
                @if ($product->subcategory->size)
                    <!-- Livewire component add-cart-item-size -->
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif($product->subcategory->color)
                    <!-- Livewire component add-cart-item-color -->
                    @livewire('add-cart-item-color', ['product' => $product])
                @else
                    <!-- Livewire component add-cart-item -->
                    @livewire('add-cart-item', ['product' => $product])
                @endif
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>
