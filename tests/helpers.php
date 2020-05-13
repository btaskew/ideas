<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @param string $class
 * @param array  $attributes
 * @param int    $count
 * @return Model|Collection
 */
function create(string $class, array $attributes = [], int $count = null)
{
    return factory($class, $count)->create($attributes);
}

/**
 * @param string $class
 * @param array  $attributes
 * @param int    $count
 * @return Model|Collection
 */
function make(string $class, array $attributes = [], int $count = null)
{
    return factory($class, $count)->make($attributes);
}

/**
 * @param string $class
 * @param array  $attributes
 * @param int    $count
 * @return array
 */
function raw(string $class, array $attributes = [], int $count = null)
{
    return factory($class, $count)->raw($attributes);
}
