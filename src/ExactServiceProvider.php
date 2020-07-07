<?php

namespace Exact;

use Exact\Commands\MakeExactImport;
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
use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\ServiceProvider;

class ExactServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishes([
            $this->getConfigFile(),
            config_path('exact.php')
        ], 'config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeExactImport::class
            ]);
        }
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            $this->getConfigFile(),
            'exact'
        );

        $this->app->bind('exact', static function ($app) {
            return new Exact();
        });

        $this->registerQueries();
    }

    protected function registerQueries(): void
    {
        $this->app->bind(EmployeesQuery::class, static function ($app) {
            return $this->buildQuery(EmployeesQuery::class);
        });

        $this->app->bind(SuppliersQuery::class, static function ($app) {
            return $this->buildQuery(SuppliersQuery::class);
        });

        $this->app->bind(ProjectsQuery::class, static function ($app) {
            return $this->buildQuery(ProjectsQuery::class);
        });

        $this->app->bind(CostCentersQuery::class, static function ($app) {
            return $this->buildQuery(CostCentersQuery::class);
        });

        $this->app->bind(DebtorsQuery::class, static function ($app) {
            return $this->buildQuery(DebtorsQuery::class);
        });

        $this->app->bind(AddressesQuery::class, static function ($app) {
            return $this->buildQuery(AddressesQuery::class);
        });

        $this->app->bind(CreditorsQuery::class, static function ($app) {
            return $this->buildQuery(CreditorsQuery::class);
        });

        $this->app->bind(ItemAssortmentQuery::class, static function ($app) {
            return $this->buildQuery(ItemAssortmentQuery::class);
        });

        $this->app->bind(ItemClassesQuery::class, static function ($app) {
            return $this->buildQuery(ItemClassesQuery::class);
        });

        $this->app->bind(ItemPricesQuery::class, static function ($app) {
            return $this->buildQuery(ItemPricesQuery::class);
        });

        $this->app->bind(ItemsQuery::class, static function ($app) {
            return $this->buildQuery(ItemsQuery::class);
        });
    }

    protected function getConfigFile(): string
    {
        return __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'exact.php';
    }

    protected function buildQuery($class)
    {
        /** @var DatabaseManager $db */
        $db = $this->app->make('db');
        /** @var Connection $connection */
        $connection = $db->connection(config('exact.connection_name'));

        return new $class($connection, $connection->getQueryGrammar(), $connection->getPostProcessor());
    }
}
