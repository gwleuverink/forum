<?php

/**
 * Make a new instance of a Eloquent object in memory
 *
 * @param [type] $class
 * @param array $attributes
 * @return Illuminate\Database\Eloquent\Model
 */
function make($class, $attributes = [])
{
    return factory($class)->create($attributes);
}

/**
 * Create a new instance of a Eloquent object
 * and save it to the database
 *
 * @param [type] $class
 * @param array $attributes
 * @return Illuminate\Database\Eloquent\Model
 */
function create($class, $attributes = [])
{
    return factory($class)->create($attributes);
}

/**
 * Make a new instance of a Eloquent object
 * and return its raw data as an array
 *
 * @param [type] $class
 * @param array $attributes
 * @return Illuminate\Database\Eloquent\Model
 */
function raw($class, $attributes = [])
{
    return factory($class)->raw($attributes);
}
