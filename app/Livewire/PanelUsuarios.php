<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Masmerise\Toaster\Toaster;
use Livewire\Attributes\Layout;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

#[Layout('layouts.app')]
class PanelUsuarios extends Component
{
    public $list_usuarios = [];
    public $list_roles = [];

    public $nombre, $correo, $password, $n_empleado, $rol;
    public $editando = false;
    public $usuario_id;

    public function mount()
    {
        $this->actualizarListas();
    }

    public function render()
    {
        return view('livewire.panel-usuarios');
    }

    public function actualizarListas()
    {
        $this->list_usuarios = User::with('roles')->get();
        $this->list_roles = Role::all();
    }

    public function guardarUsuario()
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:users,email,' . $this->usuario_id,
            'n_empleado' => 'required',
        ];

        if (!$this->editando || auth()->user()->hasRole('Administrador')) {
            $rules['rol'] = 'required|string';
        }

        if (!$this->editando) {
            $rules['password'] = 'required|min:6';
        } elseif (!empty($this->password)) {
            $rules['password'] = 'min:6';
        }

        $this->validate($rules);

        if ($this->editando) {
            $usuario = User::findOrFail($this->usuario_id);

            if (auth()->id() === $usuario->id || auth()->user()->hasRole('Administrador')) {
                $usuario->update([
                    'name' => $this->nombre,
                    'email' => $this->correo,
                    'n_empleado' => $this->n_empleado,
                ]);

                if (!empty($this->password)) {
                    $usuario->update(['password' => Hash::make($this->password)]);
                }

                if (auth()->user()->hasRole('Administrador') && !empty($this->rol)) {
                    $usuario->syncRoles([$this->rol]);
                }

                Toaster::success('Usuario actualizado correctamente !');
            } else {
                Toaster::error('No tienes permiso para editar este usuario.');
                return;
            }
        } else {
            $usuario = User::create([
                'name' => $this->nombre,
                'email' => $this->correo,
                'password' => Hash::make($this->password),
                'n_empleado' => $this->n_empleado,
            ]);

            $usuario->assignRole($this->rol);

            Toaster::success('Usuario creado correctamente !');
        }

        $this->resetFormulario();
        $this->actualizarListas();
    }

    public function editarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        $this->usuario_id = $usuario->id;
        $this->nombre = $usuario->name;
        $this->correo = $usuario->email;
        $this->n_empleado = $usuario->n_empleado;
        $this->rol = $usuario->roles->first()?->name ?? null;
        $this->password = '';
        $this->editando = true;
    }

    public function cancelarEdicion()
    {
        $this->resetFormulario();
    }

    public function eliminarUsuario($id)
    {
        $usuario = User::findOrFail($id);

        if (auth()->id() === $usuario->id) {
            Toaster::error('No puedes eliminar tu propio usuario.');
            return;
        }

        $usuario->delete();
        $this->actualizarListas();

        Toaster::success('Usuario eliminado correctamente !');
    }

    public function resetFormulario()
    {
        $this->reset(['nombre', 'correo', 'password', 'n_empleado', 'rol', 'usuario_id', 'editando']);
        $this->resetErrorBag();
    }
}
