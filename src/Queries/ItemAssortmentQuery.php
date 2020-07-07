<?php

namespace Exact\Queries;

use Exact\ExactTable;

class ItemAssortmentQuery extends Query
{
    public function table(): string
    {
        return ExactTable::ITEM_ASSORTMENT;
    }
}
