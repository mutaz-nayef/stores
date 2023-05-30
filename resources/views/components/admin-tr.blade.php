@props(['admin'])



<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
    <td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
        </div>
    </td>
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-10 h-10 rounded-full" src="{{ asset('cms/images/avatar.png') }}" alt="Jese image">
        <div class="pl-3">
            <div class="text-base font-semibold" id="admin-name-{{ $admin->id }}">{{ $admin->name }}</div>
            <div class="font-normal text-gray-500" id="admin-email-{{ $admin->id }}">{{ $admin->email }}</div>
        </div>
    </th>
    <td class="px-6 py-4" id="admin-address-{{ $admin->id }}">
        {{ $admin->address }}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
        </div>
    </td>
    <td class="px-6 py-4" id="admin-phone-{{ $admin->id }}">
        {{ $admin->phone }}
    </td>
    <td class="px-6 py-4">

        <div class="flex space-x-5">

            <a href="#" class="">
                <x-modal title="Edit Admin">
                    <x-slot name="buttonText">
                        <i class="fa-regular fa-pen-to-square font-medium text-blue-600"></i>
                    </x-slot>

                    <x-slot name="content">

                        <form class="mt-5" x-on:submit.prevent id="edit-admin">
                            @csrf

                            <x-form.input name="edit-admin-name-{{ $admin->id }}" value="{{ $admin->name }}" />
                            <x-form.input name="edit-admin-email-{{ $admin->id }}" type="email"
                                value="{{ $admin->email }}" />
                            <x-form.input name="edit-admin-phone-{{ $admin->id }}" value="{{ $admin->phone }}" />
                            <x-form.input name="edit-admin-address-{{ $admin->id }}"
                                value="{{ $admin->address }}" />
                            <button onclick="updateAdmin({{ $admin->id }}, this)"
                                class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                style="transition:.3s" ;>
                                {{ __('cms.save') }}
                            </button>


                        </form>
                    </x-slot>
                </x-modal>


            </a>
            <a href="#" class="" onclick="confirmDelete('{{ $admin->id }}',this)">
                <i class="fa-solid fa-trash  text-red-600"></i>
            </a>
        </div>
    </td>

</tr>
