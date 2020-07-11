<?php

namespace Exact;

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

        $query = $this->query();

        if (! $query instanceof Builder) {
            throw new QueryProviderNotFoundException();
        }

        $query->chunk(config('exact.chunk_total'), function (Collection $items) {
            $this->import($items);
        });

        $this->after();

        return true;
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
