<?php

namespace Exact\Queries;

use Exact\ExactTable;

class ItemPricesQuery extends Query
{
    public function table(): string
    {
        return ExactTable::ITEM_PRICES;
    }
}
