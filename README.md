# Exact Import

## Todo

- Add tests
- Better error messages

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
    ->fetch;
```

Active contract

```
Exact::employees()
    ->fields('name', 'email')
    ->activeContract()
    ->fetch;
```

Contract ended

```
Exact::employees()
    ->fields('name', 'email')
    ->contractEnded()
    ->fetch;
```

Only employees that have an email

```
Exact::employees()
    ->fields('name', 'email')
    ->hasEmail()
    ->fetch;
```

Only employees that have no email

```
Exact::employees()
    ->fields('name', 'email')
    ->hasNoEmail()
    ->fetch;
```

Only employees that have a name

```
Exact::employees()
    ->fields('name', 'email')
    ->hasName()
    ->fetch;
```

Only employees that have no name

```
Exact::employees()
    ->fields('name', 'email')
    ->hasNoName()
    ->fetch;
```

Only employees that are representative

```
Exact::employees()
    ->fields('name', 'email')
    ->isRepresentative()
    ->fetch;
```

### Addresses

```
Exact::addresses()
    ->fields()
    ->fetch;
```

### Cost Centers

```
Exact::costCenters()
    ->fields()
    ->fetch;
```

### Creditors

```
Exact::creditors()
    ->fields()
    ->fetch;
```

### Debtors

```
Exact::debtors()
    ->fields()
    ->fetch;
```

### Item Assortment

```
Exact::itemAssortment()
    ->fields()
    ->fetch;
```

### Item Classes

```
Exact::itemClasses()
    ->fields()
    ->fetch;
```

Where class id equals

```
Exact::itemClasses()
    ->fields()
    ->whereClassId(3)
    ->fetch;
```

### Item Prices

```
Exact::itemPrices()
    ->fields()
    ->fetch;
```

### Items

```
Exact::items()
    ->fields()
    ->fetch;
```

Load Class_01

```
Exact::items()
    ->fields()
    ->withClass01()
    ->fetch;
```

Load Class_02

```
Exact::items()
    ->fields()
    ->withClass02()
    ->fetch;
```

Load Class_03

```
Exact::items()
    ->fields()
    ->withClass03()
    ->fetch;
```

Load Class_04

```
Exact::items()
    ->fields()
    ->withClass04()
    ->fetch;
```

Load Class_05

```
Exact::items()
    ->fields()
    ->withClass05()
    ->fetch;
```

Load Class_06

```
Exact::items()
    ->fields()
    ->withClass06()
    ->fetch;
```

Load Class_07

```
Exact::items()
    ->fields()
    ->withClass07()
    ->fetch;
```

Load Class_08

```
Exact::items()
    ->fields()
    ->withClass08()
    ->fetch;
```

Load Class_09

```
Exact::items()
    ->fields()
    ->withClass09()
    ->fetch;
```

Load Class_10

```
Exact::items()
    ->fields()
    ->withClass10()
    ->fetch;
```

Load assortment

```
Exact::items()
    ->fields()
    ->withAssortment()
    ->fetch;
```

Load prices

```
Exact::items()
    ->fields()
    ->withPrices()
    ->fetch;
```

Load Sales Price

```
Exact::items()
    ->fields()
    ->withSalesPrice()
    ->fetch;
```

Load Sales Price Total

```
Exact::items()
    ->fields()
    ->withSalesPriceTotal()
    ->fetch;
```

### Projects

```
Exact::projects()
    ->fields()
    ->fetch;
```

Load responsible employee

```
Exact::projects()
    ->fields()
    ->withresponsibleEmployee()
    ->fetch;
```

Load responsible employee field

```
Exact::projects()
    ->fields()
    ->withResponsibleEmployeeField('email')
    ->fetch;
```

### Suppliers

```
Exact::suppliers()
    ->fields()
    ->fetch;
```

## Make Exact Import

Make an Exact import class by running the command

```
php artisan make:exact-import ExampleImport --path=App/Exact
```
