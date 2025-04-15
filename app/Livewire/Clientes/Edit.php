<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Edit extends Component
{
    public $cliente;
    public $novaSenha;
    public $novaSenha_confirmation;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;

    public function mount(Cliente $cliente)
    {
        // Inicializa os dados do cliente a partir da rota
        $this->cliente = $cliente;

    }

    protected function rules()
    {
        return [
            'cliente.nome' => 'required|string|max:255',
            'cliente.endereco' => 'required|string|max:255',
            'cliente.telefone' => 'required|string|max:15',
            'cliente.email' => 'required|email|max:255|unique:clientes,email,' . $this->cliente->id,
            'novaSenha' => 'nullable|string|min:6|confirmed',  // A senha só será exigida se fornecida
        ];
    }

    public function atualizar()
    {
        // Valida os dados antes de salvar
        $this->validate();

        // Atualiza os dados diretamente em $this->cliente, pois já estamos com a instância
        if ($this->novaSenha) {
            $this->cliente->senha = Hash::make($this->novaSenha);  // Criptografa a nova senha
        }
        ($this->nome);
        // Salva as alterações no banco de dados
        $this->cliente->save();

        // Mensagem de sucesso
        session()->flash('message', 'Cliente atualizado com sucesso!');

        // Redireciona para a lista de clientes
        return redirect()->route('clientes.index');
    }

    public function render()
    {
        // Renderiza a view com o formulário de edição
        return view('livewire.clientes.edit');
    }
}
