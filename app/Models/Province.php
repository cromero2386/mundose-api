<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'name',
    ];
}
