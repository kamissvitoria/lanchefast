<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoIndex extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10]
    ];

    public function render()
    {
        // Filtra os produtos com base no nome ou outros critérios de busca
        $produtos = Produto::where('nome', 'like', "%{$this->search}%")
            ->orWhere('valor', 'like', "%{$this->search}%")
            ->paginate($this->perPage);

        return view('livewire.produto.produto-index', compact('produtos'));
    }

    public function delete($id)
    {
        // Encontrar o produto pelo ID e excluir
        $produto = Produto::findOrFail($id);
        
        // Exclui o produto
        $produto->delete();

        // Emite uma mensagem de sucesso para o frontend
        session()->flash('message', 'Produto deletado com sucesso');
        
        // Opcional: Se você quiser emitir um evento para atualizar a lista de produtos sem recarregar a página, pode usar o emit
        $this->emit('produtoDeletado');
    }
}
