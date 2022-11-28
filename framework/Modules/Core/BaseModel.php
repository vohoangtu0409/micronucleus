<?php

namespace Module\Core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

abstract class BaseModel extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
}
