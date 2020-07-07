<?php

namespace Exact\Queries;

use Exact\ExactTable;

class SuppliersQuery extends Query
{
    public function table(): string
    {
        return ExactTable::SUPPLIERS;
    }
}
