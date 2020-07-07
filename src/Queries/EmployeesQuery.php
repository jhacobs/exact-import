<?php

namespace Exact\Queries;

use Exact\ExactTable;
use Illuminate\Database\Query\Builder;

class EmployeesQuery extends Query
{
    public function table(): string
    {
        return ExactTable::EMPLOYEES;
    }

    public function activeContract(): self
    {
        $this->where(static function (Builder $query) {
            $query->where('cont_end_date', '>=', now())
                ->orWhereNull('cont_end_date');
        });

        return $this;
    }

    public function contractEnded(): self
    {
        $this->whereNotNull('cont_end_date')
            ->where('cont_end_date', '<', now());

        return $this;
    }

    public function hasEmail(): self
    {
        $this->whereNotNull('mail');

        return $this;
    }

    public function hasName(): self
    {
        $this->whereNotNull('first_name')
            ->whereNotNull('sur_name');

        return $this;
    }

    public function hasNoEmail(): self
    {
        $this->whereNull('mail');

        return $this;
    }

    public function hasNoName(): self
    {
        $this->whereNull('first_name')
            ->whereNull('sur_name');

        return $this;
    }

    public function isRepresentative(): self
    {
        $this->where('representative', 1);

        return $this;
    }
}
