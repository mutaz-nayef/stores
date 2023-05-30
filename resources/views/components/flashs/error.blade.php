@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed bg-red-500 text-white px-4 py-2 rounded-xl top-20 right-10 text-sm">
        <p>
            {{ session('message') }}
        </p>
    </div>
@endif
