<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4 w-100" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-danger fw-bold mb-0">Lista de Clientes</h2>
            <a href="{{ route('clientes.create') }}" class="btn btn-outline-dark fw-bold">
                <i class="bi bi-plus-circle me-2"></i>Novo Cliente
            </a>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="text" wire:model.debounce.300ms="search" class="form-control"
                    placeholder="Buscar clientes. . .">
            </div>
            <div class="col-md-3">
                <select wire:model="perParge" class="form-select">
                    <option value="10">10 por página</option>
                    <option value="25">25 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success rounded-pill text-center fw-semibold">
                {{ session('message') }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $cliente)
                        <tr>
                            <td class="fw-bold text-danger">{{ $cliente->id }}</td>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->cpf }}</td>
                            <td>{{ $cliente->email }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td>
                                <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <button wire:click="delete({{ $cliente->id }})"
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Tem certeza?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-danger fw-semibold">Nenhum cliente encontrado</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $clientes->links() }}
        </div>
    </div>
</div>
