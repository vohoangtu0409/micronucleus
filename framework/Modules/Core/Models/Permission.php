<?php

namespace Module\Core\Models;

use Module\Core\BaseModel;

class Permission extends BaseModel
{


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'description',
    ];

}
