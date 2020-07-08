<?php

namespace Exact\Facades;

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
use Illuminate\Support\Facades\Facade;

/**
 * @method static void import(object $job)
 * @method static void queue(object $job)
 * @method static EmployeesQuery employees()
 * @method static SuppliersQuery suppliers()
 * @method static ProjectsQuery projects()
 * @method static CostCentersQuery costCenters()
 * @method static DebtorsQuery debtors()
 * @method static AddressesQuery addresses()
 * @method static CreditorsQuery creditors()
 * @method static ItemAssortmentQuery itemAssortment()
 * @method static ItemClassesQuery itemClasses()
 * @method static ItemPricesQuery itemPrices()
 * @method static ItemsQuery items()
 */
class Exact extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'exact';
    }
}
