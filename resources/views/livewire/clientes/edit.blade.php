<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4 w-100" style="max-width: 1200px;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-danger fw-bold mb-0">Editar Cliente</h2>
            <a href="{{ route('clientes.index') }}" class="btn btn-outline-dark fw-bold">
                <i class="bi bi-arrow-left me-2"></i>Voltar para a Lista
            </a>
        </div>

        @if (session()->has('message'))
            <div class="alert alert-success rounded-pill text-center fw-semibold">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="atualizar">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" wire:model="nome" class="form-control" placeholder="{{ $cliente->nome }}">
                @error('cliente.nome') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" wire:model="cliente.telefone" class="form-control" placeholder="{{ $cliente->telefone }}">
                @error('cliente.telefone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" wire:model="cliente.email" class="form-control" placeholder="{{ $cliente->email }}">
                @error('cliente.email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" wire:model="cliente.endereco" class="form-control" placeholder="{{ $cliente->endereco }}">
                @error('cliente.endereco') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Nova Senha</label>
                <input type="password" wire:model="novaSenha" class="form-control" placeholder="Digite a nova senha">
                @error('novaSenha') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Confirmação da Nova Senha</label>
                <input type="password" wire:model="novaSenha_confirmation" class="form-control" placeholder="Confirme a nova senha">
                @error('novaSenha_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="bi bi-save"></i> Salvar Alterações
            </button>
            <a href="{{ route('clientes.index') }}" class="btn btn-secondary ms-2">Cancelar</a>
        </form>
    </div>
</div>
