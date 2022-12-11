<?php

Illuminate\Database\Eloquent\Builder::macro('whereLike', function ($attributes, $searchTerm) {
    $this->where(function (Illuminate\Database\Eloquent\Builder $query) use ($attributes, $searchTerm) {
        foreach (Illuminate\Support\Arr::wrap($attributes) as $attribute) {
            $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        }
    });

    return $this;
});
