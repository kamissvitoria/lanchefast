<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger"> 
    <div class="card bg-warning shadow-lg rounded-4 p-4" style="width: 100%; max-width: 600px;">
        <h2 class="text-center text-danger fw-bold mb-4">Cadastro de Produto</h2>

        @if (session()->has('mensagem'))
            <div class="alert alert-success text-center">
                {{ session('mensagem') }}
            </div>
        @endif

        <form wire:submit.prevent="salvar" enctype="multipart/form-data">
            <!-- Nome -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Nome</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-box-seam text-danger"></i>
                    </span>
                    <input type="text" wire:model="nome" class="form-control" placeholder="Digite o nome do produto">
                </div>
                @error('nome') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Ingredientes -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Ingredientes</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-list-ul text-danger"></i>
                    </span>
                    <textarea wire:model="ingredientes" class="form-control" placeholder="Descreva os ingredientes"></textarea>
                </div>
                @error('ingredientes') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Valor -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Valor</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-currency-dollar text-danger"></i>
                    </span>
                    <input type="number" step="0.01" wire:model="valor" class="form-control" placeholder="Digite o valor">
                </div>
                @error('valor') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Imagem -->
            <div class="mb-4">
                <label class="form-label text-danger fw-semibold">Imagem do Produto (opcional)</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-image-fill text-danger"></i>
                    </span>
                    <input type="file" wire:model="imagem" class="form-control">
                </div>
                @error('imagem') <div class="text-danger small">{{ $message }}</div> @enderror

                @if ($imagem)
                    <div class="mt-3 text-center">
                        <img src="{{ $imagem->temporaryUrl() }}" class="img-fluid rounded shadow" style="max-height: 200px;">
                    </div>
                @endif
            </div>

            <!-- Botão -->
            <div class="d-grid">
                <button type="submit" class="btn btn-danger fw-bold">
                    <i class="bi bi-save me-2"></i>Salvar Produto
                </button>
            </div>
        </form>
    </div>
</div>
