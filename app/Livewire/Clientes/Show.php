<?php

namespace App\Livewire\Clientes;

use App\Models\Cliente;
use Livewire\Component;

class Show extends Component
{
    public $cliente = [];

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente->toArray();
    }

    public function render()
    {
        return view('livewire.clientes.show');
    }
}
