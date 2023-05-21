<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">
    <h1 class="text-3xl text-center font-semibold mb-8">
        Complete esta informacion para crear un producto
    </h1>
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
        </div>
        {{-- Subcategory --}}
        <div>
            <x-label value="Subcategorias" />
            <select wire:model="subcategory_id" class="w-full form-control">
                <option value="" selected disabled>Seleccione una subcategoria</option>
                @foreach ($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    {{-- Name --}}
    <div class="mb-4">
        <x-label value="Nombre" />
        <x-input wire:model="name" type="text" placeholder="Ingrese el nombre del producto" class="w-full" />
    </div>
    {{-- Slug --}}
    <div class="mb-4">
        <x-label value="Slug" />
        <x-input wire:model="slug" type="text" placeholder="Ingrese el slug del producto" class="w-full bg-gray-200"
            disabled />
    </div>
    {{-- Description --}}
    <div class="mb-4" wire:ignore>
        <x-label value="Descripcion" />
        <textarea class="w-full form-control" rows="4" wire:model="description" x-data x-init="ClassicEditor
            .create($refs.miEditor)
            .then(function (editor){
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData())
                })
            })
            .catch(error => {
                console.error(error);
            });"
            x-ref="miEditor">

        </textarea>
    </div>
    {{-- Brand --}}
    <div class="mb-4">
        <x-label value="Marca" />
        <select class="form-control w-full" wire:model="brand_id">
            <option value="" selected disabled>Seleccione una marca</option>
            @foreach ($brands as $brand)
                <option value="{{$brand->id}}">{{$brand->name}}</option>
            @endforeach
        </select>
    </div>
</div>
