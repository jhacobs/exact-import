# Exact Import

## Todo

- Add tests

## Installation

`composer require jhacobs/exact-import`

## Publish config

`php artisan vendor:publish --provider='Exact\ExactServiceProvider' --tag=config`

## Create Exact Globe import

You can create an Exact Globe import by extending from `Exact\ExactImport`

```
use Exact\ExactImport
use Illuminate\Support\Collection;

class ExampleImport extends ExactImport
{
    /**
    * Query the Exact Globe database
    */
    public function query() {
        //
    }

    /**
    * Handle the import
    */
    public function import(Collection $items) {
        //
    }

    /**
    * Before the import
    */
    public function before() {
        //
    }

    /**
    * After the import
    */
    public function after() {
        //
    }
}
```

### Run the import

```
Exact::import(ExampleImport);
```
### Queue the import

To queue the import, add `implements ShouldQueue` to the import class and run

```
Exact::queue(ExampleImport);
```

## Import from table

### Employees

```
Exact::employees()
    ->fields('name', 'email')
    ->get();
```

Active contract

```
Exact::employees()
    ->fields('name', 'email')
    ->activeContract()
    ->get();
```

Contract ended

```
Exact::employees()
    ->fields('name', 'email')
    ->contractEnded()
    ->get();
```

Only employees that have an email

```
Exact::employees()
    ->fields('name', 'email')
    ->hasEmail()
    ->get();
```

Only employees that have no email

```
Exact::employees()
    ->fields('name', 'email')
    ->hasNoEmail()
    ->get();
```

Only employees that have a name

```
Exact::employees()
    ->fields('name', 'email')
    ->hasName()
    ->get();
```

Only employees that have no name

```
Exact::employees()
    ->fields('name', 'email')
    ->hasNoName()
    ->get();
```

Only employees that are representative

```
Exact::employees()
    ->fields('name', 'email')
    ->isRepresentative()
    ->get();
```

### Addresses

```
Exact::addresses()
    ->fields()
    ->get();
```

### Cost Centers

```
Exact::costCenters()
    ->fields()
    ->get();
```

### Creditors

```
Exact::creditors()
    ->fields()
    ->get();
```

### Debtors

```
Exact::debtors()
    ->fields()
    ->get();
```

### Item Assortment

```
Exact::itemAssortment()
    ->fields()
    ->get();
```

### Item Classes

```
Exact::itemClasses()
    ->fields()
    ->get();
```

Where class id equals

```
Exact::itemClasses()
    ->fields()
    ->whereClassId(3)
    ->get();
```

### Item Prices

```
Exact::itemPrices()
    ->fields()
    ->get();
```

### Items

```
Exact::items()
    ->fields()
    ->get();
```

Load Class_01

```
Exact::items()
    ->fields()
    ->withClass01()
    ->get();
```

Load Class_02

```
Exact::items()
    ->fields()
    ->withClass02()
    ->get();
```

Load Class_03

```
Exact::items()
    ->fields()
    ->withClass03()
    ->get();
```

Load Class_04

```
Exact::items()
    ->fields()
    ->withClass04()
    ->get();
```

Load Class_05

```
Exact::items()
    ->fields()
    ->withClass05()
    ->get();
```

Load Class_06

```
Exact::items()
    ->fields()
    ->withClass06()
    ->get();
```

Load Class_07

```
Exact::items()
    ->fields()
    ->withClass07()
    ->get();
```

Load Class_08

```
Exact::items()
    ->fields()
    ->withClass08()
    ->get();
```

Load Class_09

```
Exact::items()
    ->fields()
    ->withClass09()
    ->get();
```

Load Class_10

```
Exact::items()
    ->fields()
    ->withClass10()
    ->get();
```

Load assortment

```
Exact::items()
    ->fields()
    ->withAssortment()
    ->get();
```

Load prices

```
Exact::items()
    ->fields()
    ->withPrices()
    ->get();
```

Load Sales Price

```
Exact::items()
    ->fields()
    ->withSalesPrice()
    ->get();
```

Load Sales Price Total

```
Exact::items()
    ->fields()
    ->withSalesPriceTotal()
    ->get();
```

### Projects

```
Exact::projects()
    ->fields()
    ->get();
```

Load responsible employee

```
Exact::projects()
    ->fields()
    ->withresponsibleEmployee()
    ->get();
```

Load responsible employee field

```
Exact::projects()
    ->fields()
    ->withResponsibleEmployeeField('email')
    ->get();
```

### Suppliers

```
Exact::suppliers()
    ->fields()
    ->get();
```

## Make Exact Import

Make an Exact import class by running the command

```
php artisan make:exact-import ExampleImport --path=App/Exact
```
