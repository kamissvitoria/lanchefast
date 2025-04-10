<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4" style="width: 100%; max-width: 600px;">
        <h2 class="text-center text-danger fw-bold mb-4">Editar Cliente</h2>

        @if (session()->has('message'))
            <div class="alert alert-success text-center rounded-pill fw-bold">
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="atualizar">
            <!-- Nome -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Nome</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-person-fill text-danger"></i>
                    </span>
                    <input type="text" wire:model="cliente.nome" class="form-control">
                </div>
                @error('cliente.nome') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Endereço -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Endereço</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-geo-alt-fill text-danger"></i>
                    </span>
                    <input type="text" wire:model="cliente.endereco" class="form-control">
                </div>
                @error('cliente.endereco') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-telephone-fill text-danger"></i>
                    </span>
                    <input type="text" wire:model="cliente.telefone" class="form-control">
                </div>
                @error('cliente.telefone') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- CPF -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">CPF</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-credit-card-2-front-fill text-danger"></i>
                    </span>
                    <input type="text" wire:model="cliente.cpf" class="form-control" disabled>
                </div>
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-envelope-fill text-danger"></i>
                    </span>
                    <input type="email" wire:model="cliente.email" class="form-control">
                </div>
                @error('cliente.email') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Nova Senha -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Nova Senha</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-lock-fill text-danger"></i>
                    </span>
                    <input type="password" wire:model="novaSenha" class="form-control" placeholder="Deixe em branco se não quiser alterar">
                </div>
                @error('novaSenha') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Confirmação da Nova Senha -->
            <div class="mb-4">
                <label class="form-label text-danger fw-semibold">Confirmar Nova Senha</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-lock-fill text-danger"></i>
                    </span>
                    <input type="password" wire:model="novaSenha_confirmation" class="form-control">
                </div>
                @error('novaSenha_confirmation') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            <!-- Botão Atualizar -->
            <div class="d-grid">
                <button type="submit" class="btn btn-danger fw-bold mb-3">
                    <i class="bi bi-save me-2"></i>Atualizar Cliente
                </button>
            </div>
        </form>

        <!-- Botão Deletar -->
        <div class="d-grid">
            <button type="button" class="btn btn-outline-dark fw-bold"
                wire:click="deletar"
                onclick="return confirm('Tem certeza que deseja deletar este cliente?')">
                <i class="bi bi-trash-fill me-2"></i>Deletar Cliente
            </button>
        </div>
    </div>
</div>
