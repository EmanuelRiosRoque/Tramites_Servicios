<x-app-layout>
    @role('Revisor')
        <script>
            window.location.href = "{{ route('consulta.tramite') }}";
        </script>
    @endrole

    <!-- Si no es Revisor, sigue viendo el contenido del dashboard normal -->
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @role('Registrador')
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Ingresa los datos solicitados') }}
                </h2>
                <div class="overflow-hidden sm:rounded-lg">
                    <x-welcome />
                </div>
            @endrole
        </div>
    </div>
</x-app-layout>
