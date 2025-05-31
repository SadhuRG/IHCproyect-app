<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body>

    <!-- HEADER -->
    <div class="w-full p-3 bg-blue-500 shadow-lg flex items-center fixed top-0 z-50">

         <div class="w-1/4 flex items-center justify-center 2xl:pr-20">
            <a href="{{ url('/') }}">
                <img src="/imagenes/LOGO.jpg" alt="Sedipro UNT - Logo" class="min-w-[100px] w-16 h-auto cursor-pointer">
            </a>
        </div>

        <!-- Menú Grande -->
        <div class="w-3/4 flex items-center justify-end pr-10 md:pr-20 ml-[5%] relative">
            <a href="{{ route('register') }}" class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-black text-accent-300 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-accent-300 border-2 lg:ml-2">
                <h1 class="flex items-center justify-center text-center text-xs text-accent-300 lg:text-xl lg:text-center">Crear Cuenta</h1>
            </a>
            <a href="{{ route('login') }}" class="ml-1 mr-2 px-5 py-3 flex items-center justify-center bg-black hover:bg-primary-300 font-semibold rounded-lg shadow-md transition-all duration-200 transform hover:scale-105 border-accent-300 hover:border-primary-300 border-2 lg:ml-2">
                <h1 class="flex items-center justify-center text-center text-xs text-white lg:text-xl lg:text-center">Iniciar Sesión</h1>
            </a>
        </div>

        <!-- Menú móvil (solo para usuarios no autenticados) -->
        <div class="hidden mt-5 fixed top-[72px] left-0 right-0 bg-white rounded-b-lg md:hidden transition-all duration-300" id="mobile-menu">
            <div class="items-center px-2 pt-2 pr-2 pb-2 space-y-1 bg-white rounded-b-lg shadow-[inset_0_12px_10px_-10px_rgba(0,0,0,0.3),0_12px_10px_-10px_rgba(0,0,0,0.4)]">
                <a href="{{ route('register') }}"
                    class="block px-3 py-2 text-center text-base font-medium text-accent-300 bg-white hover:bg-[#E7C9EE] rounded-md">
                    Crear Cuenta
                </a>
                <a href="{{ route('login') }}"
                    class="block px-3 py-2 text-center text-base font-medium text-white bg-accent-300 hover:bg-primary-300 rounded-md">
                    Iniciar Sesión
                </a>
            </div>
        </div>

    </div>
    <!-- FIN HEADER -->

    {{ $slot }}

</body>

</html>
