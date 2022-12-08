<?php

namespace App\JsonApi\V1;

use A17\Twill\API\JsonApi\V1\RelatedItems\RelatedItemSchema;
use A17\Twill\API\JsonApi\V1\Tags\TagSchema;
use A17\Twill\API\JsonApi\V1\Files\FileSchema;
// use A17\Twill\API\JsonApi\V1\Users\UserSchema;
use A17\Twill\API\JsonApi\V1\Medias\MediaSchema;
use A17\Twill\API\JsonApi\V1\Features\FeatureSchema;
use A17\Twill\API\JsonApi\V1\Settings\SettingSchema;
use App\TwillApi\V1\Users\UserSchema;
use App\TwillApi\V1\Products\ProductSchema;
use App\TwillApi\V1\ProductCategories\ProductCategorySchema;
use LaravelJsonApi\Core\Server\Server as BaseServer;

class Server extends BaseServer
{

    /**
     * The base URI namespace for this server.
     *
     * @var string
     */
    protected string $baseUri = '/api/v1';

    /**
     * Bootstrap the server when it is handling an HTTP request.
     *
     * @return void
     */
    public function serving(): void
    {
        // no-op
    }

    /**
     * Get the server's list of schemas.
     *
     * @return array
     */
    protected function allSchemas(): array
    {
        return [
            Blocks\BlockSchema::class,
            FeatureSchema::class,
            FileSchema::class,
            MediaSchema::class,
            SettingSchema::class,
            TagSchema::class,
            UserSchema::class,
            RelatedItemSchema::class,
            ProductSchema::class,
            ProductCategorySchema::class,
        ];
    }

    /**
     * Determine if the resource is authorizable.
     *
     * @return bool
     */
    public function authorizable(): bool
    {
        // Temporarily disable authorization
        // TODO: Add resources policies
        return false;
    }
}
