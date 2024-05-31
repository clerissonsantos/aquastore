<?php

namespace App\Repositories;

use App\Models\VendaItem;

class VendaItemRepository extends AbstratcRepository
{
    public function __construct(protected VendaItem $model)
    {}
}
