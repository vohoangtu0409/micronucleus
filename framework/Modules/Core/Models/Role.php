<?php

namespace Module\Core\Models;

use Module\Core\BaseModel;

class Role extends BaseModel
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

    public function permissions(){
        $this->hasMany(Permission::class);
    }

}
