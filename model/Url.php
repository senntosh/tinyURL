<?php

namespace model;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Url
 * @package model
 */
class Url extends Eloquent
{
    /**
     * @var string
     */
    protected $table = 'url';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'key', 'url'
    ];

}