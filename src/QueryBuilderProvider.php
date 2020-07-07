<?php

namespace Exact;

use Closure;
use Exact\Contracts\QueryProvider;
use Illuminate\Database\Query\Builder;

class QueryBuilderProvider implements QueryProvider
{
    protected $builder;

    protected $chunkTotal;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
        $this->chunkTotal = config('exact.chunk_total');
    }

    public function chunk(Closure $callback): QueryProvider
    {
        $this->builder->chunk($this->chunkTotal, $callback);
        return $this;
    }

    public function setChunkTotal(int $total): self
    {
        $this->chunkTotal = $total;
        return $this;
    }
}
