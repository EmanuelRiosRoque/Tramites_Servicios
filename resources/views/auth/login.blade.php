<x-guest-layout>
    <div class="min-h-screen flex">
        <!-- Lado izquierdo con imagen y texto -->
        <div class="w-1/3 bg-teal-600 text-white relative flex flex-col justify-between p-10 overflow-hidden">
            <!-- Texto superior -->
            <div class="z-10">
                <h1 class="text-3xl font-bold leading-tight">
                    Sistema de Ingreso de Trámites y <br>Servicios del PJCDMX
                </h1>
            </div>
        
            <!-- Círculo decorativo -->
            <div class="absolute w-[600px] h-[600px] bg-white opacity-10 rounded-full top-[50%] left-1/3 -translate-x-1/2 -translate-y-1/2 z-0"></div>
        
            <!-- Contenedor de imágenes alineadas -->
            <div class="z-10 flex items-end justify-center relative mt-8">
                <!-- Imagen principal más grande -->
                <img src="{{ asset('img/door.png') }}" alt="Login" >
        
                <!-- Imagen decorativa al lado derecho -->
                <img src="{{ asset('img/bottom_ornamate.png') }}" alt="Decorativo" class="h-[100px] ml-4 mb-4">
            </div>
        </div>
        
        
        
        <!-- Lado derecho con formulario -->
        <div class="w-2/3 flex items-center justify-center bg-gray-50">
            <div class="w-full max-w-xl p-10  ">
                <x-validation-errors class="mb-4" />

                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif

                <h2 class="text-xl font-bold mb-6 border-b p-6 text-center">Entrar al sistema</h2>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-5">
                        <label for="n_empleado" class="block text-sm font-medium text-gray-700 mb-1">
                            No. de empleado
                        </label>
                        <input 
                            type="text" 
                            name="n_empleado" 
                            id="n_empleado" 
                            placeholder="No. de empleado"
                            class="w-full px-4 py-5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent placeholder-gray-400"
                        />
                    </div>

                    <div class="mb-5">
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Contraseña
                        </label>
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            placeholder="Ingresa tu contraseña"
                            class="w-full px-4 py-5 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent placeholder-gray-400"
                        />
                    </div>

                    <div class="flex items-center justify-between">
                        {{-- <a href="{{ route('password.request') }}"
                            class="inline-block text-sm font-semibold bg-orange-400 text-white rounded px-4 py-2 hover:bg-orange-500 transition">
                                ¿Olvidaste tu contraseña?
                            </a> --}}

                        <x-button class="bg-teal-600 hover:bg-teal-700 focus:bg-teal-700 active:bg-teal-900 focus:ring-teal-500">
                            Ingresar
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
