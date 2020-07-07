<?php

namespace Exact\Queries;

use Exact\ExactTable;
use Illuminate\Database\Query\Builder;

class ProjectsQuery extends Query
{
    public function table(): string
    {
        return ExactTable::PROJECTS;
    }

    public function withResponsibleEmployee(): self
    {
        $this->join(ExactTable::EMPLOYEES, ExactTable::EMPLOYEES.'.res_id', ExactTable::PROJECTS.'.Responsible');

        return $this;
    }

    public function withResponsibleEmployeeField($field): self
    {
        $this->addSelect([
            'responsible_employee_'.strtolower($field) => static function (Builder $query) use ($field) {
                return $query->select($field)
                    ->from(ExactTable::EMPLOYEES)
                    ->where('res_id', 'Responsible')
                    ->limit(1);
            }
        ]);

        return $this;
    }
}
