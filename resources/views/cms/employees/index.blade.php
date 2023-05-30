@extends('layout.parent')
@section('title')
    Employees
@endsection
@section('styles')
@endsection

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg ">
        <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 p-5">
            <div x-data="{ show: false }" class="filter relative">
                <div @click="show=!show" @click.away="show=false"
                    class="flex items-center justify-between  cursor-pointer w-20 bg-gray-200 px-2 py-1 block rounded">
                    <span>Action</span>
                    <i class="fa-solid fa-angle-down block transition duration-500 transform "
                        :class="{ '-rotate-180': show }"></i>

                </div>

                <ul x-show="show" x-transition:enter="transition duration-300 transform"
                    x-transition:enter-start="scale-90 ease-out" x-transition:leave="transition duration-100 transform"
                    x-transition:leave-end="scale-90 opacity-0 ease-in"
                    class="absolute left-2 mt-2  w-64  py-1 bg-gray-200  rounded-md">
                    <li class="">
                        <a class="  block border-b border-blue-300 bg-gray-200 hover:bg-blue-50 px-4 py-2"
                            href="#">One</a>
                    </li>
                    <li class="">
                        <a class="  block border-b border-blue-300 bg-gray-200 hover:bg-blue-50 px-4 py-2"
                            href="#">Two</a>
                    </li>
                    <li class="">
                        <a class="  block border-b border-blue-300 bg-gray-200 hover:bg-blue-50 px-4 py-2"
                            href="#">Three</a>
                    </li>
                    <li class="">
                        <a class="  block  bg-gray-200 hover:bg-blue-50 px-4 py-2" href="#">Four</a>
                    </li>

                </ul>
            </div>

            <label for="table-search" class="sr-only">Search</label>
            <div class="relative">
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
                    placeholder="Search for users" value="">
            </div>
        </div>
        <table id="employees-table" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Adress
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Phone
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Job_Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Salary
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <x-employee-tr :employee="$employee" />
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('scripts')
    <script>
        function performDelete(id, reference) {
            axios
                .delete("/cms/admin/employees/" + id)
                .then(function(response) {
                    console.log(response);
                    reference.closest("tr").remove(); // give me the close tr for you then delete it
                    showMessage(response.data);
                })
                .catch(function(error) {
                    console.log(error);
                    // toastr.error(error.response.data.message);
                    showMessage(error.response.data);
                });
        }
    </script>
@endsection
