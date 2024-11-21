<!DOCTYPE html>
<html>
<head>
    <title>Laravel 11 Task List App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn{
            @apply
            rounded-md px-2 py-1 text-center font-medium shadow-sm ring-slate-500/10
            ring-1 hover:bg-slate-50 text-slate-700
        }

        .link{
            @apply
            text-lg text-slate-500 underline decoration-slate-500 hover:bg-slate-50
        }

        label{
            @apply
            block text-slate-700 mb-2
        }

        input, textarea{
            @apply
            shadow-sm appearance-none border w-full py-2 px-3 text-slate-700
            leading-tight focus:outline-none mb-1 text-left
        }

        .error{
            @apply
            text-red-500 text-sm
        }
    </style>
    {{-- blade-formatter-enable --}}

    @yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-lg">
    <h1 class="text-2xl mb-4">
        @yield('title')
    </h1>


    <div x-data="{ flash:true }">
        @if(session()->has('success'))
            <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3
        text-green-700" role="alert" >
                <strong class="font-bold">Success!</strong>
                <div>
                    {{ session('success') }}
                </div>
                <span class="absolute top-0 right-0 px-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" @click="flash = false"
                     stroke="currentColor" class="h-6 w-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
            </div>
        @endif

        @yield('content')
    </div>
</body>

</html>
