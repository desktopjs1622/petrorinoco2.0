<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'estado';
}
