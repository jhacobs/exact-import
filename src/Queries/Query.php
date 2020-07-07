<?php

namespace Exact\Queries;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

abstract class Query extends Builder
{
    abstract public function table(): string;

    public function fields($fields): self
    {
        if (! is_array($fields)) {
            $fields = func_get_args();
        }

        $this->addSelect($fields);

        return $this;
    }

    public function get($columns = ['*']): Collection
    {
        return $this->from($this->table())
            ->get($columns);
    }
}
