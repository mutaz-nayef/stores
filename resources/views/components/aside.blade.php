<aside class="sidebar  lg:w-72 w-auto bg-white px-6 py-6 z-10">
    <div class="logo-side flex items-center justify-between">
        <a href="{{ route('cms.dashboard') }}">
            <i class="fa-solid fa-store text-blue-500 text-2xl"></i>
        </a>
        <span class=" font-bold lg:block hidden text-xl text-center">Store Management</span>
    </div>
    <ul class="mt-10 transition duration-300">
        <li class="mt-0 mb-2">
            <x-aside-link :href="route('cms.dashboard')" :active="request()->routeIs('cms.dashboard')">
                <span class="lg:block hidden">
                    {{ __('cms.dashboard') }}
                </span>
                <i class="fa-solid fa-house "></i>
            </x-aside-link>
        </li>


        <li class="mt-0 mb-2">
            <x-dropdowns.dropdown>
                <x-slot name="trigger">
                    <span class="lg:block hidden ">
                        {{ __('cms.users') }}
                    </span>
                    <i class="fa-solid fa-house-user"></i>
                </x-slot>
                <x-slot name="links">
                    <ul class="bg-gray-200 rounded-md mt-2 py-2">
                        <li class="mt-0 mb-1">

                            <x-dropdowns.dropdown-item :href="route('users.index')" :active="request()->routeIs('users.index')">
                                <span class="lg:block hidden">
                                    {{ __('cms.index') }}
                                </span>
                                <i class="fa-solid fa-eye"></i>
                            </x-dropdowns.dropdown-item>
                        </li>


                        <li class="mt-0 mb-1">

                            <x-modal>
                                <x-slot name="title">Create User</x-slot>
                                <x-slot name="buttonText" style="width: 100%">
                                    <x-dropdowns.dropdown-item class="cursor-pointer" :active="request()->routeIs('users.create')">
                                        <span class="lg:block hidden">
                                            {{ __('cms.create') }}
                                        </span>
                                        <i class="fa-solid fa-plus"></i>
                                    </x-dropdowns.dropdown-item>
                                </x-slot>

                                <x-slot name="content">
                                    <form class="mt-10" x-on:submit.prevent id="create-user">
                                        @csrf
                                        <x-form.input name="name" />
                                        <x-form.input name="email" type="email" />
                                        <x-form.input name="password" type="password" />
                                        {{-- <x-form.input name="password_confirmation" type="password" /> --}}
                                        <x-form.input name="phone" />
                                        <x-form.input name="address" />
                                        <button @click="createUser"
                                            class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                            style="transition:.3s" ;>
                                            {{ __('cms.create') }}
                                        </button>


                                    </form>
                                </x-slot>
                            </x-modal>



                        </li>

                    </ul>
                </x-slot>

            </x-dropdowns.dropdown>
        </li>

        <li class="mt-0 mb-2">
            <x-dropdowns.dropdown>
                <x-slot name="trigger">
                    <span class="lg:block hidden ">
                        {{ __('cms.employees') }}
                    </span>
                    <i class="fa-solid fa-user-pen"></i>
                </x-slot>
                <x-slot name="links">
                    <ul class="bg-gray-200 rounded-md mt-2 py-2">
                        <li class="mt-0 mb-1">

                            <x-dropdowns.dropdown-item :href="route('employees.index')" :active="request()->routeIs('employees.index')">
                                <span class="lg:block hidden">
                                    {{ __('cms.index') }}
                                </span>
                                <i class="fa-solid fa-eye"></i>
                            </x-dropdowns.dropdown-item>
                        </li>


                        <li class="mt-0 mb-1">


                            <x-modal>
                                <x-slot name="title">Create Employee</x-slot>
                                <x-slot name="buttonText" style="width: 100%">
                                    <x-dropdowns.dropdown-item class="cursor-pointer" :active="request()->routeIs('employees.create')">
                                        <span class="lg:block hidden">
                                            {{ __('cms.create') }}
                                        </span>
                                        <i class="fa-solid fa-plus"></i>
                                    </x-dropdowns.dropdown-item>
                                </x-slot>

                                <x-slot name="content">

                                    <form class="" x-on:submit.prevent id="create-employee">
                                        @csrf
                                        <x-form.input name="employee-name" />
                                        <x-form.input name="employee-email" type="email" />
                                        <div class="flex items-center justify-between">

                                            <x-form.field>

                                                <label for="employee-job_title"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                                    Title</label>
                                                <select id="employee-job_title"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    <option selected>Choose a Job Title</option>
                                                    <option value="delivery_driver">{{ __('cms.delivery_driver') }}
                                                    </option>
                                                    <option value="warehouse_worker">
                                                        {{ __('cms.warehouse_worker') }}
                                                    </option>
                                                    <option value="accountant">{{ __('cms.accountant') }}</option>
                                                </select>
                                            </x-form.field>


                                            <x-form.input name="employee-salary" type="text" />
                                        </div>

                                        <x-form.input name="employee-password" type="password" />

                                        {{-- <x-form.input name="password_confirmation" type="password" /> --}}
                                        <div class="flex items-center justify-between">

                                            <x-form.input name="employee-phone" />
                                            <x-form.input name="employee-address" />
                                        </div>
                                        <button @click="createEmployee"
                                            class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                            style="transition:.3s" ;>
                                            {{ __('cms.create') }}
                                        </button>


                                    </form>


                                </x-slot>
                            </x-modal>



                        </li>

                    </ul>
                </x-slot>

            </x-dropdowns.dropdown>
        </li>

        <li class="mt-0 mb-2">
            <x-dropdowns.dropdown>
                <x-slot name="trigger">
                    <span class="lg:block hidden ">
                        {{ __('cms.managers') }}
                    </span>
                    <i class="fa-solid fa-people-roof"></i>
                </x-slot>
                <x-slot name="links">
                    <ul class="bg-gray-200 rounded-md mt-2 py-2">
                        <li class="mt-0 mb-1">

                            <x-dropdowns.dropdown-item :href="route('managers.index')" :active="request()->routeIs('managers.index')">
                                <span class="lg:block hidden">
                                    {{ __('cms.index') }}
                                </span>
                                <i class="fa-solid fa-eye"></i>
                            </x-dropdowns.dropdown-item>
                        </li>


                        <li class="mt-0 mb-1">


                            <x-modal style="display:none">
                                <x-slot name="title">Create Manager</x-slot>
                                <x-slot name="buttonText" style="width: 100%">
                                    <x-dropdowns.dropdown-item class="cursor-pointer" :active="request()->routeIs('managers.create')">
                                        <span class="lg:block hidden">
                                            {{ __('cms.create') }}
                                        </span>
                                        <i class="fa-solid fa-plus"></i>
                                    </x-dropdowns.dropdown-item>
                                </x-slot>

                                <x-slot name="content">

                                    <form class="" x-on:submit.prevent id="create-manager">
                                        @csrf
                                        <x-form.input name="manager-name" />
                                        <x-form.input name="manager-email" type="email" />
                                        <x-form.input name="manager-password" type="password" />
                                        <x-form.input name="manager-phone" />
                                        <x-form.input name="manager-address" />
                                        <button @click="createManager"
                                            class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                            style="transition:.3s" ;>
                                            {{ __('cms.create') }}
                                        </button>


                                    </form>


                                </x-slot>
                            </x-modal>



                        </li>

                    </ul>
                </x-slot>

            </x-dropdowns.dropdown>
        </li>


        <li class="mt-0 mb-2">
            <x-dropdowns.dropdown>
                <x-slot name="trigger">
                    <span class="lg:block hidden ">
                        {{ __('cms.admins') }}
                    </span>
                    <i class="fa-solid fa-house-user"></i>
                </x-slot>
                <x-slot name="links">
                    <ul class="bg-gray-200 rounded-md mt-2 py-2">
                        <li class="mt-0 mb-1">

                            <x-dropdowns.dropdown-item :href="route('admins.index')" :active="request()->routeIs('admins.index')">
                                <span class="lg:block hidden">
                                    {{ __('cms.index') }}
                                </span>
                                <i class="fa-solid fa-eye"></i>
                            </x-dropdowns.dropdown-item>
                        </li>


                        <li class="mt-0 mb-1">

                            <x-modal style="display:none">
                                <x-slot name="title">Create Admin</x-slot>
                                <x-slot name="buttonText" style="width: 100%">
                                    <x-dropdowns.dropdown-item class="cursor-pointer" :active="request()->routeIs('admins.create')">
                                        <span class="lg:block hidden">
                                            {{ __('cms.create') }}
                                        </span>
                                        <i class="fa-solid fa-plus"></i>
                                    </x-dropdowns.dropdown-item>
                                </x-slot>

                                <x-slot name="content">
                                    <form class="mt-10" x-on:submit.prevent id="create-admin">
                                        @csrf
                                        <x-form.input name="admin-name" />
                                        <x-form.input name="admin-email" type="email" />
                                        <x-form.input name="admin-password" type="password" />
                                        {{-- <x-form.input name="password_confirmation" type="password" /> --}}
                                        <x-form.input name="admin-phone" />
                                        <x-form.input name="admin-address" />
                                        <button @click="createAdmin"
                                            class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                            style="transition:.3s" ;>
                                            {{ __('cms.create') }}
                                        </button>


                                    </form>
                                </x-slot>
                            </x-modal>



                        </li>

                    </ul>
                </x-slot>

            </x-dropdowns.dropdown>
        </li>

        <hr class="bg-blue-500 h-1	">
        <li class="mt-0 mb-2">
            <x-dropdowns.dropdown>
                <x-slot name="trigger">
                    <span class="lg:block hidden ">
                        {{ __('cms.products') }}
                    </span>
                    <i class="fa-solid fa-box-open"></i>
                </x-slot>
                <x-slot name="links">
                    <ul class="bg-gray-200 rounded-md mt-2 py-2">
                        <li class="mt-0 mb-1">

                            <x-dropdowns.dropdown-item :href="route('products.index')" :active="request()->routeIs('products.index')">
                                <span class="lg:block hidden">
                                    {{ __('cms.index') }}
                                </span>
                                <i class="fa-solid fa-eye"></i>
                            </x-dropdowns.dropdown-item>
                        </li>


                       

                    </ul>
                </x-slot>

            </x-dropdowns.dropdown>
        </li>





    </ul>
</aside>
