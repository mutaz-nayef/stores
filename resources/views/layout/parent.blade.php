<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store | @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/framework.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/master.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400;0,700;1,400;1,700&family=Open+Sans:ital,wght@0,400;0,500;0,600;1,600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;1,200;1,600&display=swap"
        rel="stylesheet">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <!-- CSS file -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- JS files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body class="bg-gray-100">


    <div class="page flex m-0 p-0">
        <x-aside />
        <div class="w-full main-content">
            <x-nav />
            <div class="content p-5 mt-14">
                @yield('content')
            </div>
        </div>
    </div>

    <x-flashs.success />
    <x-flashs.error />


</body>
<script src="{{ asset('js/alpine.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="{{ asset('js/cms/user.js') }}"></script>
<script src="{{ asset('js/cms/employee.js') }}"></script>
<script src="{{ asset('js/cms/manager.js') }}"></script>
<script src="{{ asset('js/cms/admin.js') }}"></script>
<script src="{{ asset('js/cms/app.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    let modalData = {};
    let showModal = {};

    document.addEventListener("alpine:init", () => {
        Alpine.data("modalData", () => ({
            showModal: false,
            modalTitle: "",
            createUser: function() {
                // Retrieve the form data
                let form = document.getElementById('create-user');
                let formData = new FormData(form);

                // Perform some validation on the form data
                let name = formData.get('name');
                let email = formData.get('email');
                let password = formData.get('password');
                let phone = formData.get('phone');
                let address = formData.get('address');


                // Send a POST request to create the new user
                axios
                    .post("/cms/admin/users/", formData)
                    .then(response => {
                        if (response) {
                            // User created successfully, close the modal
                            let user = response.data.user;
                            var newRow = ` <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                    </td>
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-10 h-10 rounded-full" src="{{ asset('cms/images/avatar.png') }}" alt="${user.name} image">
        <div class="pl-3">
            <div class="text-base font-semibold" id="user-name">${user.name}</div>
            <div class="font-normal text-gray-500" id="user-email">${user.email}</div>
        </div>
    </th>
    <td class="px-6 py-4" id="user-address">
        ${user.address}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
        </div>
    </td>
    <td class="px-6 py-4" id="user-phone">
        ${user.phone}
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

            <form class="mt-10" x-on:submit.prevent>
                @csrf
                {{--                // cross site request forgery --}}

                <x-form.input name="edit-name-${user.id}" value="${user.name }" />
                <x-form.input name="edit-email-${user.id}" type="email"
                    value="${user.email}" />
                <x-form.input name="edit-phone-${user.id}" value="${ user.phone }" />
                <x-form.input name="edit-address-${user.id}" value="${ user.address }" />
                <button onclick="updateUser(${user.id}, this)"
                    class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                    style="transition:.3s" ;>
                    {{ __('cms.save') }}
                </button>


            </form>
        </x-slot>
        </x-modal>


      </a>
    <a href="#" class="" onclick="confirmDelete('${user.id}',this)">
    <i class="fa-solid fa-trash  text-red-600"></i>
    </a>
      </div>
    </td>
</tr>`;
                            $("#users-table tbody").append(newRow);
                            this.showModal = false;

                            toastr.success(response.data.message);

                            // Reset the form
                            form.reset();
                        } else {
                            alert('Error creating user.');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        toastr.error(error.response.data.message);
                    });
            },
            createEmployee: function() {

                var formData = new FormData();
                formData.append("name", document.getElementById("employee-name").value);
                formData.append("email", document.getElementById("employee-email").value);
                formData.append("password", document.getElementById("employee-password").value);
                formData.append("salary", document.getElementById("employee-salary").value);
                formData.append("job_title", document.getElementById("employee-job_title")
                    .value);
                formData.append("phone", document.getElementById("employee-phone").value);
                formData.append("address", document.getElementById("employee-address").value);

                // Send a POST request to create the new user
                axios
                    .post("/cms/admin/employees/", formData)
                    .then(response => {
                        if (response) {
                            const employee = response.data.employee;

                            // Create a new row and append it to the table
                            var newRow = (`
<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
<td class="w-4 p-4">
        <div class="flex items-center">
            <input id="checkbox-table-search-1" type="checkbox"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                </div>
                </td>
<th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
<img class="w-10 h-10 rounded-full" src="{{ asset('cms/images/avatar.png') }}" alt="${employee.name} image">
<div class="pl-3">
<div class="text-base font-semibold" id="employee-name-${employee.id}">${employee.name}</div>
<div class="font-normal text-gray-500" id="employee-email-${employee.id}">${employee.email}</div>
</div>
</th>
<td class="px-6 py-4" id="employee-address-${employee.id}">
${employee.address}
</td>
<td class="px-6 py-4">
<div class="flex items-center">
<div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
</div>
</td>
<td class="px-6 py-4" id="employee-phone-${employee.id}">
${employee.phone}
</td>
<td class="px-6 py-4" id="employee-job_title-${employee.id}">
${employee.job_title}
</td>
<td class="px-6 py-4" id="employee-salary-${employee.id}">
${employee.salary}
</td>
<td class="px-6 py-4">

<div class="flex space-x-5">


<a href="#" class="">
    <x-modal title="Edit Employee">
        <x-slot name="buttonText">
            <i class="fa-regular fa-pen-to-square font-medium text-blue-600"></i>
        </x-slot>

        <x-slot name="content">
            <form class="" x-on:submit.prevent id="edit-employee-form-${employee.id}">
                            @csrf
                            <x-form.input name="edit-employee-name-${employee.id}" value="${employee.name}" />
                            <x-form.input name="edit-employee-email-${employee.id}" type="email"
                                value="${employee.email }" />

                            <div class="flex items-center justify-between">
                                <x-form.field>
                                    <label for="edit-employee-job_title-${employee.id}"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Job
                                        Title</label>
                                    <select id="edit-employee-job_title-${employee.id}"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        name="edit-employee-job_title-${employee.id}">
                                        <option selected>Choose a Job Title</option>
                                        <option value="delivery_driver"
                                            ${employee.job_title == 'delivery_driver' ? 'selected' : '' }>
                                            {{ __('cms.delivery_driver') }}
                                        </option>
                                        <option value="warehouse_worker"
                                             ${employee.job_title == 'warehouse_worker' ? 'selected' : '' }>
                                            {{ __('cms.warehouse_worker') }}
                                        </option>
                                        <option value="accountant"
                                            ${employee.job_title == 'accountant' ? 'selected' : '' }>
                                            {{ __('cms.accountant') }}
                                        </option>
                                    </select>
                                    </x-form.feild>
                                    <x-form.input name="edit-employee-salary-${employee.id}" type="text"
                                        value="${employee.salary}" />

                            </div>


                            <div class="flex items-center justify-between">
                                <x-form.input name="edit-employee-phone-${employee.id}"
                                    value=" ${employee.phone }" />
                                <x-form.input name="edit-employee-address-${employee.id}"
                                    value="${employee.address}" />

                            </div>
                            <button onclick="updateEmployee(${employee.id}, this)"
                                class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                                style="transition:.3s" ;>
                                {{ __('cms.update') }}
                            </button>
                        </form>
        
     


        </x-slot>
    </x-modal>


</a>
<a href="#" class="" onclick="confirmDelete('${employee.id}',this)">
    <i class="fa-solid fa-trash  text-red-600"></i>
</a>
</div>
    </td>
</tr>`);

                            $("#employees-table tbody").append(newRow);
                            this.showModal = false;
                            toastr.success(response.data.message);
                            // Reset the form
                            let form = document.getElementById('create-employee');
                            form.reset();
                        } else {
                            alert('Error creating employee.');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        toastr.error(error.response.data.message);
                    });
            },
            createManager: function() {
                var formData = new FormData();
                formData.append("name", document.getElementById("manager-name").value);
                formData.append("email", document.getElementById("manager-email").value);
                formData.append("password", document.getElementById("manager-password").value);
                formData.append("phone", document.getElementById("manager-phone").value);
                formData.append("address", document.getElementById("manager-address").value);

                // Send a POST request to create the new user
                axios
                    .post("/cms/admin/managers/", formData)
                    .then(response => {
                        if (response) {
                            // User created successfully, close the modal
                            let manager = response.data.manager;
                            var newRow = ` <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                    </td>
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-10 h-10 rounded-full" src="{{ asset('cms/images/avatar.png') }}" alt="${manager.name} image">
        <div class="pl-3">
            <div class="text-base font-semibold" id="manager-name-${manager.id}">${manager.name}</div>
            <div class="font-normal text-gray-500" id="manager-email-${manager.id}">${manager.email}</div>
        </div>
    </th>
    <td class="px-6 py-4" id="manager-address-${manager.id}">
        ${manager.address}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
        </div>
    </td>
    <td class="px-6 py-4" id="manager-phone-${manager.id}">
        ${manager.phone}
    </td>
    <td class="px-6 py-4">

    <div class="flex space-x-5">


    <a href="#" class="">
        <x-modal>
            <x-slot name="title">Edit Manager</x-slot>
        <x-slot name="buttonText">
            <i class="fa-regular fa-pen-to-square font-medium text-blue-600"></i>
        </x-slot>

        <x-slot name="content">

            <form class="mt-5" x-on:submit.prevent>
                @csrf

                <x-form.input name="edit-manager-name-${manager.id}" value="${manager.name }" />
                <x-form.input name="edit-manager-email-${manager.id}" type="email"
                    value="${manager.email}" />
                <x-form.input name="edit-manager-phone-${manager.id}" value="${ manager.phone }" />
                <x-form.input name="edit-manager-address-${manager.id}" value="${ manager.address }" />
                <button onclick="updateManager(${manager.id}, this)"
                    class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                    style="transition:.3s" ;>
                    {{ __('cms.save') }}
                </button>


            </form>
        </x-slot>
        </x-modal>


      </a>
    <a href="#" class="" onclick="confirmDelete('${manager.id}',this)">
    <i class="fa-solid fa-trash  text-red-600"></i>
    </a>
      </div>
    </td>
</tr>`;
                            $("#managers-table tbody").append(newRow);
                            this.showModal = false;

                            toastr.success(response.data.message);
                            let form = document.getElementById('create-manager');

                            // Reset the form
                            form.reset();
                        } else {
                            alert('Error creating user.');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        toastr.error(error.response.data.message);
                    });
            },
            createAdmin: function() {
                var formData = new FormData();
                formData.append("name", document.getElementById("admin-name").value);
                formData.append("email", document.getElementById("admin-email").value);
                formData.append("password", document.getElementById("admin-password").value);
                formData.append("phone", document.getElementById("admin-phone").value);
                formData.append("address", document.getElementById("admin-address").value);

                // Send a POST request to create the new user
                axios
                    .post("/cms/admin/admins/", formData)
                    .then(response => {
                        if (response) {
                            // User created successfully, close the modal
                            let admin = response.data.admin;
                            var newRow = ` <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                    </td>
    <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
        <img class="w-10 h-10 rounded-full" src="{{ asset('cms/images/avatar.png') }}" alt="${admin.name} image">
        <div class="pl-3">
            <div class="text-base font-semibold" id="admin-name-${admin.id}">${admin.name}</div>
            <div class="font-normal text-gray-500" id="admin-email-${admin.id}">${admin.email}</div>
        </div>
    </th>
    <td class="px-6 py-4" id="admin-address-${admin.id}">
        ${admin.address}
    </td>
    <td class="px-6 py-4">
        <div class="flex items-center">
            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div> Online
        </div>
    </td>
    <td class="px-6 py-4" id="admin-phone-${admin.id}">
        ${admin.phone}
    </td>
    <td class="px-6 py-4">

    <div class="flex space-x-5">


    <a href="#" class="">
        <x-modal>
            <x-slot name="title">Edit Admin</x-slot>
        <x-slot name="buttonText">
            <i class="fa-regular fa-pen-to-square font-medium text-blue-600"></i>
        </x-slot>

        <x-slot name="content">

            <form class="mt-5" x-on:submit.prevent>
                @csrf

                <x-form.input name="edit-admin-name-${admin.id}" value="${admin.name }" />
                <x-form.input name="edit-admin-email-${admin.id}" type="email"
                    value="${admin.email}" />
                <x-form.input name="edit-admin-phone-${admin.id}" value="${ admin.phone }" />
                <x-form.input name="edit-admin-address-${admin.id}" value="${ admin.address }" />
                <button onclick="updateAdmin(${admin.id}, this)"
                    class="bg-blue-500 text-white uppercase text-xs px-10 py-2 rounded-2xl font-semibold hover:bg-blue-600"
                    style="transition:.3s" ;>
                    {{ __('cms.save') }}
                </button>


            </form>
        </x-slot>
        </x-modal>


      </a>
    <a href="#" class="" onclick="confirmDelete('${admin.id}',this)">
    <i class="fa-solid fa-trash  text-red-600"></i>
    </a>
      </div>
    </td>
</tr>`;
                            $("#admins-table tbody").append(newRow);
                            this.showModal = false;

                            toastr.success(response.data.message);

                            // Reset the form
                            let form = document.getElementById('create-admin');
                            form.reset();
                        } else {
                            alert('Error creating admin.');
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        toastr.error(error.response.data.message);
                    });
            },


        }));
    });

    function createUser() {
        return this.createUser;
    }

    function createEmployee() {
        return this.createEmployee;
    }

    function createManager() {
        return this.createManager;
    }

    function createAdmin() {
        return this.createAdmin;
    }
</script>


@yield('scripts')



</html>
