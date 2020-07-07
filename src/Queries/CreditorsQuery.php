<?php

namespace Exact\Queries;

use Exact\ExactTable;
use Illuminate\Support\Collection;

class CreditorsQuery extends Query
{
    public function table(): string
    {
        return ExactTable::SUPPLIERS;
    }

    public function get($columns = ['*']): Collection
    {
        return $this->from($this->table())
            ->where('cmp_type', 'S')
            ->get($columns);
    }
}
