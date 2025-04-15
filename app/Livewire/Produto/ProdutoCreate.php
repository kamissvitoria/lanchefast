<?php

namespace App\Livewire\Produto;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Produto;

class ProdutoCreate extends Component
{
    use WithFileUploads;

    public $nome;
    public $ingredientes;
    public $valor;
    public $imagem;

    public function salvar()
    {
        $this->validate([
            'nome' => 'required|string|max:255',
            'ingredientes' => 'required|string',
            'valor' => 'required|numeric',
            'imagem' => 'nullable|image|max:2048',
        ]);

        $imagemPath = null;

        if ($this->imagem) {
            $imagemPath = $this->imagem->store('produtos', 'public');
        }

        Produto::create([
            'nome' => $this->nome,
            'ingredientes' => $this->ingredientes,
            'valor' => $this->valor,
            'imagem' => $imagemPath,
        ]);

        session()->flash('mensagem', 'Produto cadastrado com sucesso!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}
