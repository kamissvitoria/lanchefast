<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4 w-100" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-danger fw-bold mb-0">Lista de Produtos</h2>
            <a href="{{ route('produtos.create') }}" class="btn btn-outline-dark fw-bold">
                <i class="bi bi-plus-circle me-2"></i>Novo Produto
            </a>
        </div>

        <!-- Exibição da mensagem de sucesso -->
        @if (session()->has('message'))
            <div class="alert alert-success rounded-pill text-center fw-semibold">
                {{ session('message') }}
            </div>
        @endif

        <!-- Filtros de busca e paginação -->
        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" wire:model.debounce.300ms="search" class="form-control"
                    placeholder="Buscar produtos...">
            </div>
            <div class="col-md-3">
                <select wire:model="perPage" class="form-select">
                    <option value="10">10 por página</option>
                    <option value="25">25 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
        </div>

        <!-- Exibição dos produtos -->
        <div class="row">
            @forelse($produtos as $produto)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow rounded-4 border-0">
                        <!-- Imagem do produto -->
                        @if($produto->imagem)
                            <img src="{{ asset('storage/' . $produto->imagem) }}"
                                 alt="{{ $produto->nome }}"
                                 class="card-img-top rounded-top-4"
                                 style="height: 220px; object-fit: cover;">
                        @else
                            <div class="bg-light d-flex align-items-center justify-content-center rounded-top-4" style="height: 220px;">
                                <i class="bi bi-image text-secondary" style="font-size: 3rem;"></i>
                            </div>
                        @endif

                        <div class="card-body">
                            <h5 class="card-title text-danger fw-bold">{{ $produto->nome }}</h5>
                            <p class="card-text"><strong>Ingredientes:</strong> {{ $produto->ingredientes }}</p>
                            <p class="card-text"><strong>Valor:</strong> R$ {{ number_format($produto->valor, 2, ',', '.') }}</p>
                        </div>

                        <div class="card-footer bg-transparent border-0 d-flex justify-content-between">
                            <a href="{{ route('produtos.show', $produto->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <button wire:click="delete({{ $produto->id }})" onclick="return confirm('Tem certeza?')" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-danger fw-semibold">
                    Nenhum produto encontrado
                </div>
            @endforelse
        </div>

        <!-- Paginação -->
        <div class="mt-3">
            {{ $produtos->links() }}
        </div>
    </div>
</div>
