<div class="relative">
    <x-dropdown align="right" width="96">
        <x-slot name="trigger">
            <span class="relative block cursor-pointer">
                <x-cart size="30"/>
                <!-- <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">99</span> -->
                <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
            </span>
        </x-slot>

        <x-slot name="content">
            <!--Items Cart -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Items Cart') }}
            </div>
            <div class="block px-4 py-4 text-base text-center text-gray-700">
                No tiene agregado ningun item en el carrito
            </div>
        </x-slot>
    </x-dropdown>
</div>
