@props(['employee'])



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
            <div class="text-base font-semibold" id="employee-name-{{ $employee->id }}">{{ $employee->name }}</div>
            <div class="font-normal text-gray-500" id="employee-email-{{ $employee->id }}">{{ $employee->email }}</div>
        </div>
    </th>
    <td class="px-6 py-4" id="employee-address-{{ $employee->id }}">
        {{ $employee->address }}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
        </div>
    </td>
    <td class="px-6 py-4" id="employee-phone-{{ $employee->id }}">
        {{ $employee->phone }}
    </td>
    <td class="px-6 py-4" id="employee-job_title-{{ $employee->id }}">
        {{ $employee->job_title }}
    </td>
    <td class="px-6 py-4" id="employee-salary-{{ $employee->id }}">
        {{ $employee->salary }}
    </td>
    <td class="px-6 py-4">

        <div class="flex space-x-5">


            <a href="#" class="">
                <x-modal>

                    <x-slot name="title">Edit Employee</x-slot>

                    <x-slot name="buttonText">
                        <i class="fa-regular fa-pen-to-square font-medium text-blue-600"></i>
                    </x-slot>

                    <x-slot name="content">
                        <form class="" x-on:submit.prevent id="edit-employee-form-{{ $employee->id }}">
                            @csrf
                            <x-form.input name="edit-employee-name-{{ $employee->id }}"
                                value="{{ $employee->name }}" />
                            <x-form.input name="edit-employee-email-{{ $employee->id }}" type="email"
                                value="{{ $employee->email }}" />

                            <div class="flex items-center justify-between">
                                <x-form.field>
                                    <label for="edit-employee-job_title-{{ $employee->id }}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                        Title</label>
                                    <select id="edit-employee-job_title-{{ $employee->id }}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="edit-employee-job_title-{{ $employee->id }}">
                                        <option selected>Choose a Job Title</option>
                                        <option value="delivery_driver"
                                            {{ $employee->job_title == 'delivery_driver' ? 'selected' : '' }}>
                                            {{ __('cms.delivery_driver') }}
                                        </option>
                                        <option value="warehouse_worker"
                                            {{ $employee->job_title == 'warehouse_worker' ? 'selected' : '' }}>
                                            {{ __('cms.warehouse_worker') }}
                                        </option>
                                        <option value="accountant"
                                            {{ $employee->job_title == 'accountant' ? 'selected' : '' }}>
                                            {{ __('cms.accountant') }}
                                        </option>
                                    </select>
                                    </x-form.feild>
                                    <x-form.input name="edit-employee-salary-{{ $employee->id }}" type="text"
                                        value="{{ $employee->salary }}" />

                            </div>


                            <div class="flex items-center justify-between">
                                <x-form.input name="edit-employee-phone-{{ $employee->id }}"
                                    value="{{ $employee->phone }}" />
                                <x-form.input name="edit-employee-address-{{ $employee->id }}"
                                    value="{{ $employee->address }}" />

                            </div>
                            <button onclick="updateEmployee({{ $employee->id }}, this)"
                                class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                style="transition:.3s" ;>
                                {{ __('cms.update') }}
                            </button>
                        </form>


                    </x-slot>
                </x-modal>


            </a>
            <a href="#" class="" onclick="confirmDelete('{{ $employee->id }}',this)">
                <i class="fa-solid fa-trash  text-red-600"></i>
            </a>
        </div>
    </td>

</tr>
