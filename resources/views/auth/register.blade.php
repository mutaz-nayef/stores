<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store | Login</title>
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
</head>

<body class="max-w-screen">


    <section class="px-6 py-8">

        <main class="max-w-lg mx-auto mt-10 ">

            <x-panel>


                <h1 class="text-center font-bold text-xl">Register!</h1>
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
            </x-panel>
        </main>
    </section>
    </section>



</body>
<script src="{{ asset('js/alpine.js') }}"></script>
<script src="{{ asset('js/axios.js') }}"></script>


</html>
