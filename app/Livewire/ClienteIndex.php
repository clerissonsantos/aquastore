<?php

namespace App\Livewire;

use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteIndex extends Component
{
    use WithPagination;

    public $search;

    public function pesquisar()
    {}

    public function render()
    {
        $clientes = Cliente::paginate(10);

        if ($this->search) {
            $clientes = Cliente::query()
                ->when($this->search, fn($query, $search) => $query->where('nome', 'like', "%{$search}%"))
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('telefone', 'like', "%{$this->search}%")
                ->orWhere('cpf', 'like', "%{$this->search}%")
                ->paginate(10);
        }

        return view('livewire.cliente-index', ['clientes' => $clientes]);
    }
}
