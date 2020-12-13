<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model {

    protected $fillable = ['first_name', 'middle_name', 'last_name', 'primary_phone', 'secondary_phone', 'email', 'role_id', 'manager_id', 'joining_date', 'photo'];

    public function manager()
    {
       return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
    public function payrolls() {
        return $this->hasMany(Payroll::class);
    }

}
