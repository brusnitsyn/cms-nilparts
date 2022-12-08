<?php

namespace App\TwillApi\V1\Products;

use App\Models\Product;
use A17\Twill\Image\Models\Image;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsToMany;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use LaravelJsonApi\Eloquent\Fields\Boolean;
use LaravelJsonApi\Eloquent\Fields\ArrayList;
use A17\Twill\API\JsonApi\V1\Models\ModelSchema;
use LaravelJsonApi\Eloquent\Fields\Relations\BelongsTo;
use LaravelJsonApi\Eloquent\Fields\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductSchema extends ModelSchema
{
    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = Product::class;

    /**
     * Show published or draft status attribute
     *
     * @var boolean
     */
    protected bool $publishedAttribute = true;

    protected int $maxDepth = 3;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        $fields = parent::fields();
        return array_merge($fields, [
            ID::make(),
            Str::make('title'),
            Str::make('article'),
            Str::make('manufacturer'),
            Str::make('machines'),
            Str::make('price'),
            Boolean::make('inStock', 'in_stock'),
            Str::make('shortDescription', 'short_description'),
            Str::make('fullDescription', 'full_description'),
            BelongsTo::make('productCategories')->serializeUsing(
                static fn($relation) => $relation->showDataIfLoaded()
            ),
            HasManyThrough::make('medias', 'media'),
            DateTime::make('createdAt')->sortable()->readOnly(),
            DateTime::make('updatedAt')->sortable()->readOnly(),
        ]);

        // $fields = parent::fields();

        // return array_merge($fields, [

        // ]);
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

        ]);
    }

    public function indexQuery(?Request $request, Builder $query): Builder
    {
        return $query->where('published', 1);
    }
}
