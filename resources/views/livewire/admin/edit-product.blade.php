<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para crear un producto
    </h1>
    <div class="bg-white shadow-xl rounded-lg p-6">
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- Category --}}
            <div>
                <x-label value="Categorias" />
                <select wire:model="category_id" class="w-full form-control">
                    <option value="" selected disabled>Seleccione una categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="category_id" />
            </div>
            {{-- Subcategory --}}
            <div>
                <x-label value="Subcategorias" />
                <select wire:model="product.subcategory_id" class="w-full form-control">
                    <option value="" selected disabled>Seleccione una subcategoria</option>
                    @foreach ($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="product.subcategory_id" />
            </div>
        </div>
        {{-- Name --}}
        <div class="mb-4">
            <x-label value="Nombre" />
            <x-input wire:model="product.name" type="text" placeholder="Ingrese el nombre del producto"
                class="w-full" />
            <x-input-error for="product.name" />
        </div>
        {{-- Slug --}}
        <div class="mb-4">
            <x-label value="Slug" />
            <x-input wire:model="slug" type="text" placeholder="Ingrese el slug del producto"
                class="w-full bg-gray-200" disabled />
            <x-input-error for="slug" />
        </div>
        {{-- Description --}}
        <div class="mb-4">
            <div wire:ignore>
                <x-label value="Descripcion" />
                <textarea class="w-full form-control" rows="4" x-data x-init="ClassicEditor
                    .create($refs.miEditor)
                    .then(function(editor) {
                        editor.model.document.on('change:data', () => {
                            $dispatch('input', editor.getData())
                        })
                    })
                    .catch(error => {
                        console.error(error);
                    });" x-ref="miEditor"
                    wire:model.defer="product.description">
                </textarea>
            </div>
            <x-input-error for="product.description" />
        </div>
        <div class="grid grid-cols-2 gap-6 mb-4">
            {{-- Brand --}}
            <div>
                <x-label value="Marca" />
                <select class="form-control w-full" wire:model="product.brand_id">
                    <option value="" selected disabled>Seleccione una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                <x-input-error for="product.brand_id" />
            </div>
            {{-- Price --}}
            <div>
                <x-label value="Precio" />
                <x-input wire:model.defer="product.price" type="number" class="w-full" step=".01" />
                <x-input-error for="product.price" />
            </div>
        </div>
        @if ($subcategory)
            @if (!$subcategory->color && !$subcategory->size)
                {{-- Quantity --}}
                <div class="mb-4">
                    <x-label value="cantidad" />
                    <x-input wire:model.lazy="product.quantity" type="number" class="w-full" />
                    <x-input-error for="product.quantity" />
                </div>
            @endif
        @endif

        <div class="flex justify-end items-center">
            <x-action-message class="mr-3" on="saved">
                Actualizado
            </x-action-message>
            <x-button class="" wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Actualizar producto
            </x-button>
        </div>
    </div>
    @if ($subcategory)
        @if ($subcategory->size)
            @livewire('admin.size-product', ['product' => $product], key('size-product-' . $product->id))
        @elseif($subcategory->color)
            @livewire('admin.color-product', ['product' => $product], key('color-product-' . $product->id))
        @endif
    @endif
</div>
