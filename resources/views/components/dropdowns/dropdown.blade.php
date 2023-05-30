@props(['trigger', 'links'])
<div x-data="{ show: false }" class="relative">

    {{-- Trigger --}}
    <div @click="show = ! show"
        class="flex items-center lg:justify-between justify-center cursor-pointer text-sm  font-semibold rounded-md lg:px-4 py-2 hover:bg-gray-100 "
        :class="{ 'bg-gray-100': show }">
        {{ $trigger }}

        {{-- <i class="fa-solid fa-user  " :class="{ '-rotate-180': show }"></i> --}}
    </div>

    {{-- Links --}}


    <div x-show="show" x-transition:enter="transition  ease-out duration-300"
        x-transition:enter-start="transform  opacity-0" x-transition:enter-end="  opacity-100"
        x-transition:leave="transition  ease-out duration-300 " x-transition:leave-end=" opacity-0" class=" bg-white " style="display: none;">
        {{ $links }}
    </div>
</div>
