<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Login | Polyplex DigiPrint</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:300,400,500,600,700|montserrat:600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-[#0E4174] to-[#1a5ca8] font-sans antialiased flex items-center justify-center p-4">

<div class="w-full max-w-md">
    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">

        {{-- Header --}}
        <div class="bg-[#0E4174] px-8 py-8 text-center">
            <div class="bg-white rounded-xl p-3 inline-block mb-4">
                <x-logo />
            </div>
            <h1 class="text-white font-heading font-bold text-xl tracking-tight">Admin Panel</h1>
            <p class="text-blue-200 text-sm mt-1">Sign in to manage products</p>
        </div>

        {{-- Form --}}
        <div class="px-8 py-8">

            @if(session('success'))
                <div class="mb-4 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                        placeholder="admin@polyplex.in"
                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-gray-300' }}"
                    />
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-1.5">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        placeholder="••••••••"
                        class="w-full px-4 py-2.5 border rounded-lg text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#0E4174] focus:border-transparent transition {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-gray-300' }}"
                    />
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button
                    type="submit"
                    class="w-full py-3 bg-[#0E4174] hover:bg-[#0b3360] text-white font-semibold text-sm rounded-lg transition-colors shadow-md cursor-pointer"
                >
                    Sign In to Admin Panel
                </button>
            </form>

            <div class="mt-6 pt-5 border-t border-gray-100 text-center">
                <a href="{{ url('/') }}" class="text-sm text-[#0E4174] hover:underline">&larr; Back to Website</a>
            </div>
        </div>
    </div>

    <p class="text-center text-blue-200 text-xs mt-4">&copy; {{ date('Y') }} Polyplex DigiPrint. All rights reserved.</p>
</div>

</body>
</html>
