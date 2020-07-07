<?php

declare(strict_types=1);

namespace Exact\Queries;

use Exact\ExactTable;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Str;

class ItemsQuery extends Query
{
    public function table(): string
    {
        return ExactTable::ITEMS;
    }

    public function withClass01(): self
    {
        return $this->withClass('Class_01');
    }

    public function withClass02(): self
    {
        return $this->withClass('Class_02');
    }

    public function withClass03(): self
    {
        return $this->withClass('Class_03');
    }

    public function withClass04(): self
    {
        return $this->withClass('Class_04');
    }

    public function withClass05(): self
    {
        return $this->withClass('Class_05');
    }

    public function withClass06(): self
    {
        return $this->withClass('Class_06');
    }

    public function withClass07(): self
    {
        return $this->withClass('Class_07');
    }

    public function withClass08(): self
    {
        return $this->withClass('Class_08');
    }

    public function withClass09(): self
    {
        return $this->withClass('Class_09');
    }

    public function withClass10(): self
    {
        return $this->withClass('Class_10');
    }

    public function withAssortment(string $assortmentField = 'Description'): self
    {
        $this->addSelect([
            Str::snake($assortmentField) => static function (Builder $query) use ($assortmentField) {
                $query->select($assortmentField)
                    ->from(ExactTable::ITEM_ASSORTMENT)
                    ->where('Items.Assortment', 'ItemAssortment.Assortment')
                    ->limit(1);
            }
        ]);

        return $this;
    }

    public function withPrices(string $pricesField = 'SalesPrice'): self
    {
        $this->addSelect([
            Str::snake($pricesField) => static function (Builder $query) use ($pricesField) {
                $query->select($pricesField)
                    ->from(ExactTable::ITEM_PRICES)
                    ->whereColumn('Items.ItemCode', 'ItemPrices.ItemCode')
                    ->limit(1);
            }
        ]);

        return $this;
    }

    public function withSalesPrice(): self
    {
        return $this->withPrices('SalesPrice');
    }

    public function withSalesPriceTotal(): self
    {
        return $this->withPrices('SalesPriceTotal');
    }

    protected function withClass(string $class, string $itemClassesField = 'Description'): self
    {
        $this->addSelect([
            Str::snake($itemClassesField) => static function (Builder $query) use ($itemClassesField, $class) {
                $query->select($itemClassesField)
                    ->from(ExactTable::ITEM_CLASSES)
                    ->whereColumn('ItemClassCode', $class)
                    ->limit(1);
            }
        ]);

        return $this;
    }
}
