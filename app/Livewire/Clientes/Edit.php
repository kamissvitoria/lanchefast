<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $cliente = [];
    public $novaSenha;
    public $novaSenha_confirmation;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente->toArray();
    }

    protected function rules()
    {
        return [
            'cliente.nome' => 'required|string|max:255',
            'cliente.endereco' => 'required|string|max:255',
            'cliente.telefone' => 'required|string|max:15',
            'cliente.email' => 'required|email|max:255|unique:clientes,email,' . $this->cliente['id'],
            'novaSenha' => 'nullable|string|min:6|confirmed',
        ];
    }

    public function atualizar()
    {
        $this->validate();

        $cliente = Cliente::findOrFail($this->cliente['id']);
        $cliente->fill($this->cliente);

        if ($this->novaSenha) {
            $cliente->senha = Hash::make($this->novaSenha);
        }

        $cliente->save();

        session()->flash('message', 'Cliente atualizado com sucesso!');
        return redirect()->route('clientes.index');
    }

    public function deletar()
    {
        Cliente::destroy($this->cliente['id']);

        session()->flash('message', 'Cliente deletado com sucesso!');
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.clientes.edit');
    }
}
