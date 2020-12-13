<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payroll extends Model {

    protected $fillable = ['employee_id', 'month', 'year', 'total_days', 'worked_days', 'pf_uan_number', 'account_number', 'gross_salary', 'basic_salary', 'hra', 'fix_conveyance', 'medical_alloawnce', 'internet_alloawnce', 'telephone', 'professional_development', 'special_allowance', 'employee_pf', 'employer_pf', 'tds', 'professional_tax', 'other', 'total_deduction', 'take_home_pay'];

    public function employee() {
        return $this->belongsTo(Employee::class);
    }

    public function basicPay() {
        if($this->gross_salary) {
            return $this->basic_salary = ceil(($this->gross_salary * 40) / 100) ;
        }
        return $this->basic_salary = 0;
    }
    
    public function HRA() {
        if($this->gross_salary) {
            return $this->hra = ceil(($this->gross_salary * 16) / 100) ;
        }
        return $this->hra = 0;
    }
    
    public function specialAllowance() {
        if($this->gross_salary && $this->basic_salary  && $this->total_deduction && $this->hra) {
            return $this->special_allowance = ceil(($this->gross_salary - $this->total_deduction) - ($this->basic_salary + $this->hra + $this->fix_conveyance + $this->medical_alloawnce + $this->internet_alloawnce + $this->telephone + $this->professional_development));
        }
        return $this->special_allowance = 0;
    }
    
    public function takeHomePay() {
        if($this->gross_salary && $this->basic_salary  && $this->total_deduction && $this->hra) {
            return $this->take_home_pay = ceil(($this->gross_salary - $this->total_deduction));
        }
        return $this->take_home_pay = 0;
    }

}
