<div>
    <!-- Card -->
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">
                {{ $category->name }}
            </h1>
            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i wire:click="$set('view', 'grid')"
                    class="fas fa-border-all p-3 cursor-pointer
                {{ $view == 'grid' ? 'text-orange-500' : '' }}"></i>
                <i wire:click="$set('view', 'list')"
                    class="fas fa-th-list p-3 cursor-pointer
                {{ $view == 'list' ? 'text-orange-500' : '' }}"></i>
            </div>
        </div>
    </div>
    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
        <!-- Category filters -->
        <aside>
            <h2 class="font-semibold text-center mb-2">
                Subcategorias
            </h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="hover:text-orange-500 capitalize cursor-pointer 
                        {{ $subcategoryF == $subcategory->name ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click="$set('subcategoryF', '{{ $subcategory->name }}')">
                            {{ $subcategory->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <h2 class="font-semibold text-center mb-2">
                Brands
            </h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="py-2 text-sm">
                        <a class="hover:text-orange-500 capitalize cursor-pointer
                        {{ $brandF == $brand->name ? 'text-orange-500 font-semibold' : '' }}"
                            wire:click="$set('brandF', '{{ $brand->name }}')">
                            {{ $brand->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-button class="mt-4" wire:click="cleanFilters()">
                Eliminar filtros
            </x-button>
        </aside>
        <!-- Products -->
        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <!-- Grid presentation -->
                <ul class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="h-48 w-full object-cover object-center"
                                        src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="{{ route('products.show', $product) }}">
                                            {{ Str::limit($product->name, 20) }}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-neutral-700">
                                        US$ {{ $product->price }}
                                    </p>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @else
                <!-- List presentation -->
                <ul>
                    @foreach ($products as $product)
                        <x-product-list :product="$product" />
                    @endforeach
                </ul>
            @endif
            <div class="mt-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
