<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProdutoEdit extends Component
{
    use WithFileUploads;

    public Produto $produto;
    public $imagem;

    protected function rules()
    {
        return [
            'produto.nome' => 'required|string|max:255',
            'produto.valor' => 'required|numeric|min:0',
            'produto.ingredientes' => 'nullable|string',
            'imagem' => 'nullable|image|max:2048',
        ];
    }

    public function mount(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function update()
    {
        $this->validate();

        if ($this->imagem) {
            // Apaga a imagem anterior, se existir
            if ($this->produto->imagem && \Storage::exists($this->produto->imagem)) {
                \Storage::delete($this->produto->imagem);
            }

            // Salva a nova imagem
            $this->produto->imagem = $this->imagem->store('produtos', 'public');
        }

        // Atualiza o produto
        $this->produto->save();

        session()->flash('message', 'Produto atualizado com sucesso!');
        return redirect()->route('produtos.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
