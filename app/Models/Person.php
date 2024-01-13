<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use SoftDeletes;
    protected $table = 'people';
    protected $primaryKey = 'id';
    protected $fillable = [
        'firtname',
        'lastname',
        'email',
        'province_id'
    ];
    public function province()
    {
        return $this->belongsTo(Person::class, 'province_id', 'id');
    }
}
