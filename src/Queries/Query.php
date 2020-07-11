<?php

namespace Exact\Queries;

use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\Grammars\Grammar;
use Illuminate\Database\Query\Processors\Processor;
use Illuminate\Support\Collection;

abstract class Query extends Builder
{
    public function __construct(ConnectionInterface $connection, Grammar $grammar = null, Processor $processor = null)
    {
        parent::__construct($connection, $grammar, $processor);

        $this->from($this->table());
    }

    abstract public function table(): string;

    public function fields($fields): self
    {
        if (! is_array($fields)) {
            $fields = func_get_args();
        }

        $this->addSelect($fields);

        return $this;
    }

    public function fetch($columns = ['*']): Collection
    {
        return $this->get($columns);
    }
}
