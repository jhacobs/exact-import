<?php

namespace Exact;

use Exact\Exceptions\InvalidImportJobTypeException;
use Exact\Jobs\QueueImport;
use Exact\Queries\AddressesQuery;
use Exact\Queries\CostCentersQuery;
use Exact\Queries\CreditorsQuery;
use Exact\Queries\DebtorsQuery;
use Exact\Queries\EmployeesQuery;
use Exact\Queries\ItemAssortmentQuery;
use Exact\Queries\ItemClassesQuery;
use Exact\Queries\ItemPricesQuery;
use Exact\Queries\ItemsQuery;
use Exact\Queries\ProjectsQuery;
use Exact\Queries\SuppliersQuery;

class Exact
{
    public function import($job): void
    {
        if (! $job instanceof ExactImport) {
            throw new InvalidImportJobTypeException();
        }

        $job->run();
    }

    public function queue($job): void
    {
        QueueImport::dispatch($job)
            ->onQueue(config('exact.queue_name'))
            ->onConnection(config('exact.queue_connection'));
    }

    public function employees(): EmployeesQuery
    {
        return resolve(EmployeesQuery::class);
    }

    public function suppliers(): SuppliersQuery
    {
        return resolve(SuppliersQuery::class);
    }

    public function projects(): ProjectsQuery
    {
        return resolve(ProjectsQuery::class);
    }

    public function costCenters(): CostCentersQuery
    {
        return resolve(CostCentersQuery::class);
    }

    public function debtors(): DebtorsQuery
    {
        return resolve(DebtorsQuery::class);
    }

    public function addresses(): AddressesQuery
    {
        return resolve(AddressesQuery::class);
    }

    public function creditors(): CreditorsQuery
    {
        return resolve(CreditorsQuery::class);
    }

    public function itemAssortment(): ItemAssortmentQuery
    {
        return resolve(ItemAssortmentQuery::class);
    }

    public function itemClasses(): ItemClassesQuery
    {
        return resolve(ItemClassesQuery::class);
    }

    public function itemPrices(): ItemPricesQuery
    {
        return resolve(ItemPricesQuery::class);
    }

    public function items(): ItemsQuery
    {
        return resolve(ItemsQuery::class);
    }
}
