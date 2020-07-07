<?php

namespace Exact;

use Exact\Contracts\QueryProvider;
use Exact\Exceptions\QueryProviderNotFoundException;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

abstract class ExactImport
{
    abstract public function query();

    abstract public function import(Collection $items);

    public function run(): bool
    {
        $this->before();

        $this->queryProvider($this->query())->chunk(function (Collection $items) {
            $this->import($items);
        });

        $this->after();

        return true;
    }

    protected function queryProvider($query): QueryProvider
    {
        if ($query instanceof Builder) {
            return new QueryBuilderProvider($query);
        }

        throw new QueryProviderNotFoundException();
    }

    protected function before(): void
    {
        //
    }

    protected function after(): void
    {
        //
    }
}
