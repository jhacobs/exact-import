<?php

namespace Exact\Queries;

use Exact\ExactTable;

class ItemClassesQuery extends Query
{
    public function table(): string
    {
        return ExactTable::ITEM_CLASSES;
    }

    public function whereClassId($id): self
    {
        return $this->where('ClassID', $id);
    }
}
