<div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-danger">
    <div class="card bg-warning shadow-lg rounded-4 p-4" style="width: 100%; max-width: 600px;">
        <h2 class="text-center text-danger fw-bold mb-4">Cadastro de Cliente</h2>

        <form wire:submit.prevent="salvar">
            <!-- Nome -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Nome</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-person-fill text-danger"></i></span>
                    <input type="text" wire:model="nome" class="form-control" placeholder="Digite o nome">
                </div>
                @error('nome')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Endereço -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Endereço</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-geo-alt-fill text-danger"></i></span>
                    <input type="text" wire:model="endereco" class="form-control" placeholder="Digite o endereço">
                </div>
                @error('endereco')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Telefone</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-telephone-fill text-danger"></i></span>
                    <input type="text" wire:model="telefone" class="form-control" placeholder="Digite o telefone">
                </div>
                @error('telefone')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- CPF -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">CPF</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i
                            class="bi bi-credit-card-2-front-fill text-danger"></i></span>
                    <input type="text" wire:model="cpf" class="form-control" placeholder="Digite o CPF">
                </div>
                @error('cpf')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Email</label>
                <div class="input-group">
                    <span class="input-group-text bg-light"><i class="bi bi-envelope-fill text-danger"></i></span>
                    <input type="email" wire:model="email" class="form-control" placeholder="Digite o email">
                </div>
                @error('email')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            <!-- Senha -->
            <div class="mb-3">
                <label class="form-label text-danger fw-semibold">Senha</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-lock-fill text-danger"></i>
                    </span>
                    <input type="password" wire:model="senha" class="form-control">
                </div>
                @error('senha')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirmação de Senha -->
            <div class="mb-4">
                <label class="form-label text-danger fw-semibold">Confirmar Senha</label>
                <div class="input-group">
                    <span class="input-group-text bg-light">
                        <i class="bi bi-lock-fill text-danger"></i>
                    </span>
                    <input type="password" wire:model="senha_confirmation" class="form-control">
                </div>
                @error('senha_confirmation')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>
            

            <!-- Botão -->
            <div class="d-grid">
                <button type="submit" class="btn btn-danger fw-bold">
                    <i class="bi bi-save me-2"></i>Salvar Cliente
                </button>
            </div>
        </form>
    </div>
</div>
