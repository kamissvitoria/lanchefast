<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Create extends Component
{
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;
    public $senha;
    public $senha_confirmation;

    protected $rules = [
        'nome' => 'required|string|max:255',
        'endereco' => 'required|string|max:255',
        'telefone' => 'required|string|max:15',
        'cpf' => 'required|string|max:14|unique:clientes',
        'email' => 'required|email|max:255|unique:clientes',
        'senha' => 'required|string|min:6|confirmed',
    ];

    public function salvar()
    {
        $this->validate();

        Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'telefone' => $this->telefone,
            'cpf' => $this->cpf,
            'email' => $this->email,
            'senha' => Hash::make($this->senha), // Criptografa a senha
        ]);

        session()->flash('message', 'Cliente criado com sucesso!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.clientes.create');
    }
}
