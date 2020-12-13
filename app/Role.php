<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model {

    protected $fillable = ['name'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}
