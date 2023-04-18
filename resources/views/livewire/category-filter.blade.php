<div>
    <!-- Card -->
    <div class="bg-white rounded-lg shadow-lg mb-6">
        <div class="px-6 py-2 flex justify-between items-center">
            <h1 class="font-semibold text-gray-700 uppercase">
                {{$category->name}}
            </h1>
            <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-500">
                <i wire:click="$set('view', 'grid')" class="fas fa-border-all p-3 cursor-pointer
                {{$view == 'grid' ? 'text-orange-500' : ''}}"></i>
                <i wire:click="$set('view', 'list')" class="fas fa-th-list p-3 cursor-pointer
                {{$view == 'list' ? 'text-orange-500' : ''}}"></i>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-5 gap-6">
        <!-- Category filters -->
        <aside>
            <h2 class="font-semibold text-center mb-2">
                Subcategorias
            </h2>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="py-2 text-sm">
                        <a class="hover:text-orange-500 capitalize cursor-pointer 
                        {{$subcategoryF == $subcategory->name ? 'text-orange-500 font-semibold' : ''}}"
                            wire:click="$set('subcategoryF', '{{$subcategory->name}}')">
                            {{$subcategory->name}}
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
                        {{$brandF == $brand->name ? 'text-orange-500 font-semibold' : ''}}"
                            wire:click="$set('brandF', '{{$brand->name}}')">
                            {{$brand->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
            <x-button class="mt-4" wire:click="cleanFilters()">
                Eliminar filtros
            </x-button>
        </aside>
        <!-- Products -->
        <div class="col-span-4">
            @if ($view == 'grid')
                <!-- Grid presentation -->
                <ul class="grid grid-cols-4 gap-6">
                    @foreach ($products as $product)
                        <li class="bg-white rounded-lg shadow">
                            <article>
                                <figure>
                                    <img class="h-48 w-full object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
                                </figure>
                                <div class="py-4 px-6">
                                    <h1 class="text-lg font-semibold">
                                        <a href="">
                                            {{Str::limit($product->name, 20)}}
                                        </a>
                                    </h1>
                                    <p class="font-bold text-neutral-700">
                                        US$ {{$product->price}}
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
                        <li class="bg-white rounded-lg shadow mb-4">
                            <article class="flex">
                                <figure>
                                    <img class="h-48 w-56 object-cover object-center" src="{{Storage::url($product->images->first()->url)}}" alt="">
                                </figure>
                                <div class="flex-1 py-4 px-6 flex flex-col justify-between">
                                    <div class="flex justify-between">
                                        <div>
                                            <h1 class="text-lg font-semibold text-gray-700">
                                                {{$product->name}}
                                            </h1>
                                            <p class="font-bold text-gray-700">
                                                USD {{$product->price}}
                                            </p>
                                        </div>
                                        <div class="flex items-center">
                                            <ul class="flex text-sm">
                                                <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                                <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                                <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                                <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                                <li><i class="fas fa-star text-yellow-400 mr-1"></i></li>
                                            </ul>
                                            <span class="text-gray-700 text-sm">(24)</span>
                                        </div>
                                        
                                    </div>
                                    <div class="mb-4">
                                        <x-danger-button>
                                            Mas Informacion
                                        </x-danger-button>
                                    </div>
                                </div>
                            </article>
                        </li>
                    @endforeach
                </ul>
            @endif
            
           
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
    </div>
</div>