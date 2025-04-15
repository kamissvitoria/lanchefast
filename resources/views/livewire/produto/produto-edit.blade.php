<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4 w-100" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-danger fw-bold mb-0">Editar Produto</h2>
            <a href="{{ route('produtos.index') }}" class="btn btn-outline-dark fw-bold">
                <i class="bi bi-arrow-left me-2"></i>Voltar para a Lista
            </a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success rounded-pill text-center fw-semibold">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="update" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" wire:model="produto.nome" class="form-control" placeholder="{{ $produto->nome }}">
                @error('produto.nome') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Valor</label>
                <input type="text" wire:model="produto.valor" class="form-control" placeholder="{{ $produto->valor }}">
                @error('produto.valor') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Ingredientes</label>
                <textarea wire:model="produto.ingredientes" class="form-control" rows="3" placeholder="{{ $produto->ingredientes }}"></textarea>
                @error('produto.ingredientes') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Imagem Atual</label><br>
                @if ($produto->imagem)
                    <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Imagem atual" class="img-thumbnail mb-2" style="max-height: 200px;">
                @else
                    <p class="text-muted">Nenhuma imagem cadastrada.</p>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Imagem (opcional)</label>
                <input type="file" wire:model="imagem" class="form-control">
                @error('imagem') <span class="text-danger">{{ $message }}</span> @enderror

                @if ($imagem)
                    <div class="mt-2">
                        <p class="text-muted">Pré-visualização:</p>
                        <img src="{{ $imagem->temporaryUrl() }}" class="img-thumbnail" style="max-height: 200px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Salvar Alterações
            </button>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </div>
</div>
