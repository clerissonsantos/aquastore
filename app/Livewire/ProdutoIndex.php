<?php

namespace App\Livewire;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class ProdutoIndex extends Component
{
    use WithPagination;

    public $search;

    public function pesquisar()
    {}

    public function render()
    {
        session(['tela_atual' => 'Produtos']);
        $produtos = Produto::paginate(10);

        if ($this->search) {
            $produtos = Produto::query()
                ->when($this->search, fn($query, $search) => $query->where('nome', 'like', "%{$search}%"))
                ->paginate(10);
        }

        return view('livewire.produto-index', ['produtos' => $produtos]);
    }
}
