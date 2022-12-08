<?php

namespace App\Filters;

class UserFilter
{
    public function filter($builder, $value)
    {
        return $builder->where('pub_user_id', $value);
    }
}
