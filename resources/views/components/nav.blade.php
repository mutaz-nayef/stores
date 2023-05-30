<nav class="w-full bg-white   px-5 py-6 flex items-center justify-between">
    <div class="search relative">
        <i class="absolute top-2 left-2 fa-solid fa-magnifying-glass text-sm text-gray-500"></i>
        <input type="text" class=" px-7 py-1 rounded-lg border border-gray-300  focus:border-blue-100 focus:ring-2"
            placeholder="Search Something...">
    </div>
    <div class="flex items-center justify-between space-x-6 px-4">

        {{-- @dd(Auth::guard('admin')->check()) --}}

        @if (Auth::guard('user')->check() ||
                Auth::guard('employee')->check() ||
                Auth::guard('manager')->check() ||
                Auth::guard('admin')->check())
            <div x-data="{ showNotif: false }" class="notifications relative">
                <i @click="showNotif=!showNotif" @click.away="showNotif=false"
                    class="fa-regular fa-bell  text-xl cursor-pointer"></i>
                <ul x-show="showNotif" x-transition:enter="transition duration-300 transform"
                    x-transition:enter-start="scale-90 ease-out" x-transition:leave="transition duration-100 transform"
                    x-transition:leave-end="scale-90 opacity-0 ease-in"
                    class="absolute -left-64 mt-2  w-64  py-1 bg-gray-200  rounded-md">
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

            <div x-data="{ showInfo: false }" class="avatar relative">
                {{-- <i @click="showInfo=!showInfo" @click.away="showInfo=false"
                    class="fa-solid fa-user-astronaut "></i> --}}

                <img @click="showInfo=!showInfo" @click.away="showInfo=false" src="{{ asset('cms/images/avatar.png') }}"
                    class="w-10 h-10 cursor-pointer" alt="">

                <ul x-show="showInfo" x-transition:enter="transition duration-300 transform"
                    x-transition:enter-start="scale-90 ease-out" x-transition:leave="transition duration-100 transform"
                    x-transition:leave-end="scale-90 opacity-0 ease-in"
                    class="absolute -left-64 mt-2  w-64  py-1 bg-gray-200  rounded-md">
                    <li class="">
                        <a class="  block border-b border-blue-300 bg-gray-200 hover:bg-blue-100 px-4 py-2 text-sm font-bold"
                            href="{{ route('cms.logout') }}">Logout</a>
                    </li>
                    <li class="">
                        <a class="  block border-b border-blue-300 bg-gray-200 hover:bg-blue-50 px-4 py-2"
                            href="#">Two</a>
                    </li>

                </ul>

            </div>
        @else
            <!-- x-show.transition.duration.500ms.scale.0="show"  --transition-opacity -->
            <div x-data="{ show: false }">
                <a href="#" @click="show = !show"
                    class="text-sm font-bold text-black hover:text-blue-500 transition ">
                    Login</a>
                <div x-show="show" x-transition:enter="transition transform duration-1000"
                    x-transition:enter-start="opacity-0 scale-125" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 flex items-center justify-center z-10">

                    <div class=" w-1/2 bg-blue-200 p-6 rounded-lg relative ">
                        <h1 class="text-center font-bold text-xl">Log In!</h1>
                        <i @click="show = false"
                            class="fa-solid fa-circle-xmark text-sm cursor-pointer text-red-500 absolute top-2 right-4"></i>

                        <form class=" mt-2 " action="{{ route('cms.login') }}" method="POST">
                            @csrf
                            {{--                // cross site request forgery --}}

                            <x-form.input name="email" type="email" autocomplete="username" />
                            <x-form.input name="password" type="password" autocomplete="new-password" />
                            <x-form.button class="mb-2">Log In</x-form.button>
                        </form>
                    </div>

                </div>
            </div>
            <div x-data="{ show: false }">
                <a href="#" @click="show = !show"
                    class="text-sm font-bold text-black hover:text-blue-500 transition">
                    Register</a>
                <div x-show="show" x-transition:enter="transition transform duration-1000"
                    x-transition:enter-start="opacity-0 scale-125" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition duration-200" x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0" class="fixed inset-0 flex items-center justify-center z-10">

                    <div class=" w-1/2 bg-blue-200 p-6 rounded-lg relative">
                        <h1 class="text-center font-bold text-xl">Register!</h1>
                        <i @click="show = false"
                            class="fa-solid fa-circle-xmark text-sm cursor-pointer text-red-500 absolute top-2 right-4"></i>

                        <form class="mt-10" action="/cms/register" method="POST">
                            @csrf
                            {{--                // cross site request forgery --}}

                            <x-form.input name="name" />
                            <x-form.input name="email" type="email" />
                            <x-form.input name="password" type="password" />
                            {{-- <x-form.input name="password_confirmation" type="password" /> --}}
                            <x-form.input name="phone" />
                            <x-form.input name="address" />
                            <x-form.button>Register</x-form.button>

                        </form>
                    </div>

                </div>
            </div>
        @endif

    </div>



</nav>
