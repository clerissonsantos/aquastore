<?php

namespace App\Livewire;

use App\Repositories\VendaItemRepository;
use Livewire\Component;

class RankProdutoMes extends Component
{
    public function render()
    {
        $itens = VendaItemRepository::itensMaisVendidosDoMes();
        return view('livewire.rank-produto-mes')->with([
            'itens' => $itens
        ]);
    }
}
