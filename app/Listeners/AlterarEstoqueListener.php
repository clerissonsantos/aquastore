<?php

namespace App\Listeners;

use App\Enums\Estoque;
use App\Models\Produto;

class AlterarEstoqueListener
{
    public function handle($event): void
    {
        $produtos = $event->produtos;

        foreach ($produtos as $produto) {
            $model = Produto::find($produto->id);

            if ($event->movimentacao === Estoque::SAIDA->name) {
                $model->estoque -= $produto->quantidade;
            } else {
                $model->estoque += $produto->quantidade;
            }

            $model->save();
        }
    }
}
