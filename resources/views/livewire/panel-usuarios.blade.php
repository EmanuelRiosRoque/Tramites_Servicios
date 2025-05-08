<div class="mt-2 max-w-7xl mx-auto">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- 🧾 Tabla de usuarios -->
        <section class="bg-white p-4 rounded-lg">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Lista de usuarios</h2>
            <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="py-3.5 px-4 text-sm text-left text-gray-500">Nombre</th>
                            <th class="px-12 py-3.5 text-sm text-left text-gray-500">Rol</th>
                            <th class="px-4 py-3.5 text-sm text-left text-gray-500">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($list_usuarios as $usuario)
                            <tr>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <h2 class="font-medium text-gray-800">{{ $usuario->name }}</h2>
                                        <p class="text-sm text-gray-600">{{ $usuario->n_empleado }}</p>
                                    </div>
                                </td>
                                <td class="px-12 py-4 text-sm whitespace-nowrap">
                                    <span class="inline px-3 py-1 rounded-full text-emerald-500 bg-emerald-100/60">
                                        {{ $usuario->roles->first()?->name ?? 'Sin rol' }}
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap flex gap-2 items-center">
                                    <button wire:click="editarUsuario({{ $usuario->id }})" class="text-gray-600 hover:text-blue-600 transition">
                                        ✏️
                                    </button>
                                    <button wire:click="eliminarUsuario({{ $usuario->id }})" class="text-gray-600 hover:text-red-600 transition">
                                        🗑️
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        <!-- 📝 Formulario de registro / edición -->
        <section class="bg-white border border-gray-200 p-6 rounded-lg">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">
                {{ $editando ? 'Editar usuario' : 'Registrar usuario' }}
            </h2>

            <form wire:submit.prevent="guardarUsuario">
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Nombre</label>
                        <input type="text" wire:model.defer="nombre" class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                        @error('nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo</label>
                        <input type="email" wire:model.defer="correo" class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                        @error('correo') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Contraseña</label>
                        <input type="password" wire:model.defer="password" class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                        @if ($editando)
                            <p class="text-xs text-gray-500">Déjalo en blanco si no deseas cambiarla.</p>
                        @endif
                        @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Número de empleado</label>
                        <input type="text" wire:model.defer="n_empleado" class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                        @error('n_empleado') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Rol</label>
                        <select wire:model.defer="rol" class="w-full mt-1 rounded-md border-gray-300 shadow-sm">
                            <option value="">Selecciona un rol</option>
                            @foreach ($list_roles as $r)
                                <option value="{{ $r->name }}">{{ ucfirst($r->name) }}</option>
                            @endforeach
                        </select>
                        @error('rol') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-4 flex gap-4">
                        <button type="submit" class="w-full px-4 py-2 text-white bg-teal-600 hover:bg-teal-700 rounded-md shadow">
                            {{ $editando ? 'Actualizar usuario' : 'Guardar usuario' }}
                        </button>

                        @if ($editando)
                            <button type="button" wire:click="cancelarEdicion" class="w-full px-4 py-2 text-gray-600 bg-gray-200 rounded-md">
                                Cancelar
                            </button>
                        @endif
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
