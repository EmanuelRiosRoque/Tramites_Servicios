<nav x-data="{ open: false }" class="bg-gradient-to-r from-teal-700 to-teal-500 text-white shadow-md">
    @auth
    <div class="max-w-7xl mx-auto px-6 py-4 h-[150px] flex flex-col justify-between relative text-white">
    @else
    <div class="max-w-7xl mx-auto px-6 py-4 h-[250px] flex flex-col justify-between relative text-white">
    @endauth
        <!-- Sección superior: navegación -->
        <div class="flex items-center justify-between m-4 z-10">
            <!-- Logo + Nombre -->
            @auth
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('img/logo-w.png') }}" class="h-10" alt="Logo PJCDMX">
                </a>
                <div class="hidden sm:block font-semibold text-sm">
                    {{ Auth::user()->name }}
                </div>
            </div>
            @else
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('img/logo-w.png') }}" class=" h-14" alt="Logo PJCDMX">
            </a>
            @endauth

            <!-- Botón hamburguesa (solo visible en móvil) -->
            <button @click="open = !open" class="sm:hidden focus:outline-none">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <!-- Enlaces navegación (solo en desktop) -->
            @auth
            <div class="hidden sm:flex space-x-4 items-center text-sm font-semibold">
                <div class="flex gap-4">
                    <a 
                        href="{{ route('consulta.tramite') }}"
                        class="px-4 py-2 rounded-md shadow transition cursor-pointer 
                            {{ request()->routeIs('consulta.tramite') ? 'bg-emerald-400 text-white' : 'bg-white text-teal-700 hover:bg-gray-100' }}"
                    >
                        Consulta Trámites/Servicios
                    </a>

                    @unlessrole('Revisor')
                        <a 
                            href="{{ route('dashboard') }}"
                            class="px-4 py-2 rounded-md shadow transition cursor-pointer 
                                {{ request()->routeIs('dashboard') ? 'bg-emerald-400 text-white' : 'bg-white text-teal-700 hover:bg-gray-100' }}"
                        >
                            Registro Trámites/Servicios
                        </a>
                    @endunlessrole
                </div>

                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <button type="submit"
                        class="bg-red-500 text-white px-4 py-2 rounded-md shadow hover:bg-red-600 transition">
                        Cerrar sesión
                    </button>
                </form>
            </div>
            @endauth
        </div>

        <!-- Sección central: título -->
        @auth
        <div class="text-center z-10 mt-3 animate__animated animate__fadeIn">
            <h1 class="text-xl sm:text-3xl font-extrabold leading-tight">
                Sistema de Ingreso de Trámites y Servicios del PJCDMX
            </h1>
        </div>
        @else
        <div class="text-center z-10 m-6 animate__animated animate__fadeIn">
            <h1 class="text-xl sm:text-5xl font-extrabold leading-tight">
                Sistema de Ingreso de Trámites y Servicios del <br> PJCDMX
            </h1>
        </div>
        @endauth
        

        <!-- SVG edificios a la izquierda -->
        <img src="{{ asset('img/v_2.svg') }}" class="absolute bottom-0 left-0 h-28 z-0" alt="Decoración izquierda">

        <!-- SVG edificios a la derecha -->
        <img src="{{ asset('img/v_2.svg') }}" class="absolute bottom-0 right-0 h-28 z-0" alt="Decoración derecha">
    </div>

    <!-- Menú móvil -->
    @auth
    <div class="sm:hidden px-4 pb-4" :class="{ 'block': open, 'hidden': !open }">
        <div class="space-y-2 text-sm font-semibold">
            <a 
                href="{{ route('consulta.tramite') }}"
                @click="open = false"
                class="block w-full px-4 py-2 rounded hover:bg-white/10 
                    {{ request()->routeIs('consulta.tramite') ? 'bg-white/10 font-bold' : '' }}"
            >
                Consulta Trámites/Servicios
            </a>

            @unlessrole('Revisor')
                <a 
                    href="{{ route('dashboard') }}"
                    @click="open = false"
                    class="block w-full px-4 py-2 rounded hover:bg-white/10 
                        {{ request()->routeIs('dashboard') ? 'bg-white/10 font-bold' : '' }}"
                >
                    Registro Trámites/Servicios
                </a>
            @endunlessrole

            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 rounded hover:bg-red-600">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
    @endauth
</nav>
