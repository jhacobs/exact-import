<?php

namespace Exact\Queries;

use Exact\ExactTable;

class AddressesQuery extends Query
{
    public function table(): string
    {
        return ExactTable::ADDRESSES;
    }
}
