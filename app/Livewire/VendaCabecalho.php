<?php

namespace App\Livewire;

use App\Models\Cliente;
use App\Models\Venda;
use Livewire\Component;

class VendaCabecalho extends Component
{
    public string $search = '';
    public Venda|null $venda;

    public function render()
    {
        if ($this->search !== '') {
            $clientes = Cliente::query()
                ->when($this->search, fn($query, $search) => $query->where('nome', 'like', "%{$search}%"))
                ->orWhere('email', 'like', "%{$this->search}%")
                ->orWhere('telefone', 'like', "%{$this->search}%")
                ->orWhere('cpf', 'like', "%{$this->search}%")
                ->limit(10)
                ->get();
        } else {
            $clientes = Cliente::all();
        }

        return view('livewire.venda-cabecalho', ['clientes' => $clientes]);
    }
}
