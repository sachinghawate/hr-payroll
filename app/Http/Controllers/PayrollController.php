<?php

namespace App\Http\Controllers;

use App\Payroll;
use App\Employee;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Session;

class PayrollController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id) {
        $employee = Employee::findOrFail($id);
        return view('payroll.create')->with('employee', $employee);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id) {

        $this->validate($request, [
            'month' => 'required',
            'year' => 'required',
            'total_days' => 'required',
            'worked_days' => 'required',
            'pf_uan_number' => 'required',
            'account_number' => 'required',
            'gross_salary' => 'required',
                ], [
            'month.required' => 'Please select the Month',
            'year.required' => 'Please select the Year',
            'total_days' => 'Please enter the Total Days',
            'worked_days' => 'Please enter the Worked Days',
            'pf_uan_number.required' => 'Please enter the PF UAN Number',
            'account_number.required' => 'Please enter the Account Number',
            'gross_salary.required' => 'Please enter the Gross Salary',
        ]);

        $payroll = Payroll::create([
            'month' => $request->month,
            'year' => $request->year,
            'total_days' => $request->total_days,
            'worked_days' => $request->worked_days,
            'pf_uan_number' => $request->pf_uan_number,
            'account_number' => $request->account_number,
            'gross_salary' => $request->gross_salary,
            'employee_id' => $id,
            'fix_conveyance' => '1600',
            'medical_alloawnce' => '1250',
            'internet_alloawnce' => '1000',
            'telephone' => '1000',
            'professional_development' => '2000',
            'employee_pf' => '1800',
            'employer_pf' => '1800',
            'professional_tax' => '200',
            'other' => '12592',
            'total_deduction' => '16392'
        ]);

        $payroll->basicPay();
        $payroll->HRA();
        $payroll->specialAllowance();
        $payroll->takeHomePay();
        $payroll->save();

        Session::flash('success', 'Payroll Created');
        return redirect()->route('payrolls.show', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payrollIndex($id) {
        $employee = Employee::findOrFail($id);
        return view('payroll.payroll')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $payroll = Payroll::findOrFail($id);
        return view('payroll.edit')->with('payroll', $payroll);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'month' => 'required',
            'year' => 'required',
            'total_days' => 'required',
            'worked_days' => 'required',
            'pf_uan_number' => 'required',
            'account_number' => 'required',
            'gross_salary' => 'required',
                ], [
            'month.required' => 'Please select the Month',
            'year.required' => 'Please select the Year',
            'total_days' => 'Please enter the Total Days',
            'worked_days' => 'Please enter the Worked Days',
            'pf_uan_number.required' => 'Please enter the PF UAN Number',
            'account_number.required' => 'Please enter the Account Number',
            'gross_salary.required' => 'Please enter the Gross Salary',
        ]);

        $payroll = Payroll::findOrFail($id);
        $payroll->month = $request->month;
        $payroll->year = $request->year;
        $payroll->total_days = $request->total_days;
        $payroll->worked_days = $request->worked_days;
        $payroll->pf_uan_number = $request->pf_uan_number;
        $payroll->account_number = $request->account_number;
        $payroll->gross_salary = $request->gross_salary;
        $payroll->save();

        $payroll->basicPay();
        $payroll->HRA();
        $payroll->specialAllowance();
        $payroll->takeHomePay();
        $payroll->save();

        Session::flash('success', 'Payroll Updated');
        return redirect()->route('payrolls.show', ['id' => $payroll->employee_id]);
    }
}
