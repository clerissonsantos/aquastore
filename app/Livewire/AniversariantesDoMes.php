<?php

namespace App\Livewire;

use Livewire\Component;

class AniversariantesDoMes extends Component
{
    public function render()
    {
        return view('livewire.aniversariantes-do-mes')->with([
            'aniversariantes' => \App\Models\Cliente::whereMonth('data_nascimento', date('m'))->get()
        ]);
    }
}
