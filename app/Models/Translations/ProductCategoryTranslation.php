<?php

namespace App\Models\Translations;

use A17\Twill\Models\Model;
use App\Models\ProductCategory;

class ProductCategoryTranslation extends Model
{
    protected $baseModuleModel = ProductCategory::class;
}
