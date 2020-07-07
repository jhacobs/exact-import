<?php

namespace Exact\Queries;

use Exact\ExactTable;

class CostCentersQuery extends Query
{
    public function table(): string
    {
        return ExactTable::COST_CENTERS;
    }
}
