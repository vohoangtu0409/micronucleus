<?php

namespace Module\Core\Models;

use Module\Core\BaseModel;

class SettingHistory extends BaseModel
{

    protected $table = "setting_history";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'value',
        'name',
        'description',
    ];

}
