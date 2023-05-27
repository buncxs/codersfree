<div class="">
    <div>
        {{-- Category --}}
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
        <select wire:model="subcategory_id" class="w-full form-control">
            <option value="" selected disabled>Seleccione una subcategoria</option>
            @foreach ($subcategories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
            @endforeach
        </select>
        <x-input-error for="subcategory_id" />
    </div>
    {{-- Brand --}}
    <div>
        <x-label value="Marca" />
        <select class="form-control w-full" wire:model="brand_id">
            <option value="" selected disabled>Seleccione una marca</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
        <x-input-error for="brand_id" />
    </div>
</div>
