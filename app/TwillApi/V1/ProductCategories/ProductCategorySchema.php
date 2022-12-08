<?php

namespace App\TwillApi\V1\ProductCategories;

use App\Models\ProductCategory;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\ArrayHash;
use LaravelJsonApi\Eloquent\Fields\Map;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\HasMany;
use LaravelJsonApi\Eloquent\Fields\Relations\HasOne;
use LaravelJsonApi\Eloquent\Pagination\PagePagination;
use A17\Twill\API\JsonApi\V1\Models\ModelSchema;

class ProductCategorySchema extends ModelSchema
{
    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = ProductCategory::class;

    /**
     * Show published or draft status attribute
     *
     * @var boolean
     */
    protected bool $publishedAttribute = true;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        $fields = parent::fields();

        return [
            ID::make(),
            Str::make('title'),
            Map::make('parent', [
                Str::make('title'),
              ])->on('parent'),
            // ArrayHash::make('parent'),
            HasMany::make('products')->serializeUsing(
                static fn($relation) => $relation->alwaysShowData()
            ),
            // HasOne::make('parent')->type('product-categories')->serializeUsing(
            //     static fn($relation) => $relation->alwaysShowData()
            // ),
            BelongsTo::make('childrens')->type('product-categories')->serializeUsing(
                static fn($relation) => $relation->showDataIfLoaded()
            ),
            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
        ];
    }

    /**
     * Get the resource filters.
     *
     * @return array
     */
    public function filters(): array
    {
        $filters = parent::filters();

        return array_merge($filters, [
            //
        ]);
    }

    public function pagination(): PagePagination
    {
        return PagePagination::make();
    }
}
