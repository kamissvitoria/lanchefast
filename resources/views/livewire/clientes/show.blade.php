<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4" style="width: 100%; max-width: 600px;">
        <h2 class="text-center text-danger fw-bold mb-4">Detalhes do Cliente</h2>

        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-warning">
                <strong class="text-danger">Nome:</strong> {{ $cliente['nome'] ?? '-' }}
            </li>
            <li class="list-group-item bg-warning">
                <strong class="text-danger">Endereço:</strong> {{ $cliente['endereco'] ?? '-' }}
            </li>
            <li class="list-group-item bg-warning">
                <strong class="text-danger">Telefone:</strong> {{ $cliente['telefone'] ?? '-' }}
            </li>
            <li class="list-group-item bg-warning">
                <strong class="text-danger">CPF:</strong> {{ $cliente['cpf'] ?? '-' }}
            </li>
            <li class="list-group-item bg-warning">
                <strong class="text-danger">Email:</strong> {{ $cliente['email'] ?? '-' }}
            </li>
        </ul>

        <div class="d-grid gap-2 mt-4">
            <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark fw-bold">
                <i class="bi bi-arrow-left me-2"></i>Voltar
            </a>
        </div>
    </div>
</div>
