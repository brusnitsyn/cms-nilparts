<?php

namespace App\TwillApi\V1\Users;

use App\Models\User;
use LaravelJsonApi\Eloquent\Fields\ID;
use LaravelJsonApi\Eloquent\Fields\Str;
use LaravelJsonApi\Eloquent\Fields\DateTime;
use A17\Twill\API\JsonApi\V1\Models\ModelSchema;

class UserSchema extends ModelSchema
{
    /**
     * The model the schema corresponds to.
     *
     * @var string
     */
    public static string $model = User::class;

    /**
     * Show published or draft status attribute
     *
     * @var boolean
     */
    protected bool $publishedAttribute = false;

    /**
     * Get the resource fields.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            ID::make(),
            Str::make('name'),
            Str::make('email'),
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
}
