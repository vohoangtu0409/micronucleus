<?php

namespace Module\Core\Models;

use Module\Core\BaseModel;

class Setting extends BaseModel
{


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

    public function history(){
        $this->hasMany(SettingHistory::class);
    }
}
