@extends('layout.parent')
@section('title')
    Proudcts
@endsection
@section('styles')
@endsection

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <div class="lg:flex items-center justify-between pb-4 bg-gray-300 dark:bg-gray-900 p-5">
            <div x-data="{ show: false }" class="filter relative">
                <div @click="show=!show" @click.away="show=false"
                    class="flex items-center justify-between  px-4 py-1 bg-white rounded lg:space-x-6 cursor-pointer">
                    <span class="w-auto">{{ __('cms.category') }}</span>
                    <i class="fa-solid fa-angle-down block transition duration-500 transform "
                        :class="{ '-rotate-180': show }"></i>

                </div>

                <ul x-show="show" x-transition:enter="transition duration-300 transform"
                    x-transition:enter-start="scale-90 ease-out" x-transition:leave="transition duration-100 transform"
                    x-transition:leave-end="scale-90 opacity-0 ease-in"
                    class="absolute left-2 mt-2  w-64 h-64 overflow-y-scroll py-1 bg-gray-400 rounded-md z-10"
                    style="display: none">

                    <li class="">
                        <a class="  block border-b border-blue-300 bg-white hover:bg-blue-500 hover:text-white px-4 py-1"
                            href="#">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="">
                            <a class="  block border-b border-blue-300 bg-white hover:bg-blue-500 hover:text-white px-4 py-1"
                                href="/cms/admin/products/?category={{ $category->name }}&{{ http_build_query(request()->except('category', 'page')) }}">{{ $category->name }}</a>
                        </li>
                    @endforeach


                </ul>
            </div>

            <label for="search" class="sr-only">Search</label>
            <div class="relative lg:mt-0 mt-3">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="table-search-users"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search for product.." value="">
            </div>
        </div>



        <section class="text-gray-600 body-font bg-white">

            <div class=" float-right inline-block m-5">
                <x-modal>
                    <x-slot name="title">Create Product</x-slot>

                    <x-slot name="buttonText" style="width: 100%">
                        <span
                            class="inline  bg-green-500 py-1 px-4 rounded text-white hover:bg-green-600 transition duration-500 ">
                            {{ __('cms.create') }} {{ __('cms.product') }}
                        </span>
                    </x-slot>

                    <x-slot name="content">
                        <form class="mt-5" x-on:submit.prevent id="create-product">
                            @csrf
                            <x-form.input name="name" />
                            <x-form.input name="price" type="number" step="0.01" />
                            <x-form.input name="description" type="textarea" />
                            <x-form.input name="image" type="file" />
                            <x-form.input name="quantity" type="number" />
                            <select name="category_id" id="category">
                                <option value="">Select a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                            <select name="subcategory_id" id="subcategory">
                                <option value="">Select a subcategory</option>
                            </select>



                            <button @click="createProduct"
                                class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                style="transition:.3s" ;>
                                {{ __('cms.create') }}
                            </button>
                        </form>

                    </x-slot>
                </x-modal>
            </div>




            <div class="container px-5 py-20 lg:mx-auto">
                @if (request('category'))
                    <div x-data="{ show: false }" class="filter relative">
                        <div @click="show=!show" @click.away="show=false" style="width: fit-content"
                            class="flex items-center justify-between text-blue-500 uppercase font-semibold text-sm  px-4 py-1 mt-0 mb-2 bg-white rounded lg:space-x-6 cursor-pointer">
                            <span class="w-auto">{{ __('cms.category') }}</span>
                            <i class="fa-solid fa-angle-down block transition duration-500 transform "
                                :class="{ '-rotate-180': show }"></i>

                        </div>

                        <ul x-show="show" x-transition:enter="transition duration-300 transform"
                            x-transition:enter-start="scale-90 ease-out"
                            x-transition:leave="transition duration-100 transform"
                            x-transition:leave-end="scale-90 opacity-0 ease-in"
                            class="absolute left-2 mt-1 h-32   overflow-y-scroll py-1 bg-gray-400 rounded-md z-10"
                            style="display: none">

                            <li class="">
                                <a class="  block border-b border-blue-300 bg-white hover:bg-blue-500 hover:text-white px-4 text-xs py-1"
                                    href="#">All</a>
                            </li>
                            {{-- <input type="hidden" name="category" value="{{ request('category') }}"> --}}
                            @foreach ($subcategories as $subCategory)
                                <li class="">
                                    <a class="  block border-b border-blue-300 bg-white hover:bg-blue-500 hover:text-white px-4 text-xs py-1"
                                        href="/cms/admin/products/?subcategory={{ $subCategory->name }}&{{ http_build_query(request()->except('subcategory', 'page')) }}">
                                        {{ $subCategory->name }}</a>
                                </li>
                            @endforeach


                        </ul>
                    </div>
                @endif

                <div class="flex flex-wrap -m-4">
                    @foreach ($products as $product)
                        <div class="lg:w-1/4 md:w-1/2 p-4 w-full ">

                            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                                <a class="block relative h-48 rounded overflow-hidden ">
                                    <img alt="ecommerce" class="object-cover object-center w-full h-full block"
                                        src="{{ $product->image }}">
                                </a>
                                <div class="p-4 hover:bg-gray-100 transtion duration-300">
                                    <div class="flex items-center space-x-1">
                                        <a href="#"
                                            class="ml-auto text-red-400 text-xs tracking-widest title-font mb-1 border border-red-300 hover:text-white hover:bg-red-300 transisition duration-300 rounded-xl px-3 py-1">
                                            {{ $product->subcategory->name }}</a>

                                    </div>

                                    <h2 class="text-gray-900 title-font text-lg font-medium">The Catalyzer</h2>
                                    <p class="mt-1"> ${{ $product->price }}</p>
                                    <button
                                        class="text-purple-600  px-2 py-2 hover:text-purple-800 hover:underline  transisition duration-300  mt-2">Order
                                        Now</button>

                                </div>

                            </div>

                        </div>
                    @endforeach



                </div>
                <div class="mt-10">

                    {{-- {{ $products->links() }} --}}
                </div>
            </div>

        </section>
    @endsection

    @section('scripts')
        <script>
            const categorySelect = document.getElementById('category');
            const subcategorySelect = document.getElementById('subcategory');

            categorySelect.addEventListener('change', (event) => {
                const categoryId = event.target.value;
                if (categoryId) {
                    fetch(`/api/subcategories/${categoryId}`)
                        .then(response => response.json())
                        .then(subcategories => {
                            subcategorySelect.innerHTML = '';
                            subcategories.forEach(subcategory => {
                                const option = document.createElement('option');
                                option.value = subcategory.id;
                                option.textContent = subcategory.name;
                                subcategorySelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error(error));
                } else {
                    subcategorySelect.innerHTML = '<option value="">Select a subcategory</option>';
                }
            });
        </script>
    @endsection
    {{-- <div class="flex items-center space-x-1">


                                    <a href="#"
                                        class="ml-auto text-blue-400 text-xs tracking-widest title-font mb-1 border border-blue-300 hover:text-white hover:bg-blue-500 transisition duration-300 rounded-xl px-3 py-1">
                                        CATEGORY</a>
                                </div> --}}
