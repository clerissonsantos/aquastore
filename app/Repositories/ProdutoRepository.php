<?php

namespace App\Repositories;

use App\Models\Produto;

class ProdutoRepository extends AbstratcRepository
{
    public function __construct(protected Produto $model)
    {}
}
