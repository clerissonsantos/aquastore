<?php

namespace App\Repositories;

use App\Models\ModelInterface;

class AbstratcRepository
{
    protected array $dados;

    public function salvar(array $dados): bool|ModelInterface
    {
        $this->dados = $dados;

        if (!empty($dados['id'])) {
            return $this->atualizar();
        }

        return $this->criar();
    }

    private function criar(): ModelInterface
    {
        return $this->model->create($this->dados);
    }

    private function atualizar(): bool|ModelInterface
    {
        $registro = $this->model->find($this->dados['id']);

        if (!$registro) {
            return false;
        }

        $registro->update($this->dados);
        return $registro;
    }
}
