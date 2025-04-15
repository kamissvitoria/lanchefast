<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4 w-100" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-danger fw-bold mb-0">Detalhes do Produto</h2>
            <a href="{{ route('produtos.index') }}" class="btn btn-outline-dark fw-bold">
                <i class="bi bi-arrow-left me-2"></i>Voltar para a Lista
            </a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success rounded-pill text-center fw-semibold">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" class="form-control" value="{{ $produto['nome'] }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Valor</label>
            <input type="text" class="form-control" value="{{ $produto['valor'] }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Ingredientes</label>
            <textarea class="form-control" rows="3" disabled>{{ $produto['ingredientes'] }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem</label><br>
            @if ($produto['imagem'])
                <img src="{{ asset('storage/' . $produto['imagem']) }}" alt="Imagem do Produto" class="img-thumbnail mb-2" style="max-height: 200px;">
            @else
                <p class="text-muted">Nenhuma imagem cadastrada.</p>
            @endif
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('produtos.edit', $produto['id']) }}" class="btn btn-warning me-2">
                <i class="bi bi-pencil"></i> Editar
            </a>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Voltar para a Lista
            </a>
        </div>
    </div>
</div>
