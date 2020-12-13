<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="box">
                <div>
                    <table class="w-100 table border">
                        <tr height="100px">
                            <td colspan="6"><h3 class="font-weight-bold">Hartley Labs Pvt. Ltd.</h3></td>
                            <td colspan="2">
                                <img height="40px" class="text-right" src='https://www.hartleylab.com/wp-content/themes/hartley/assets/images/logo.png' />
                            </td>
                        </tr>
                        <tr height="100px">
                            <td colspan="8">
                                <h6 class="text-center font-weight-bold mb-0">PAY SLIP - {{ $payroll->month ?? '-' }} {{ $payroll->year ?? '-' }}</h6>
                            </td>
                        </tr>
                        <tr>
                            <th colspan='3'>
                                <small><strong>Name of the Employee</strong></small><br>
                                <small><strong>Employee Code</strong></small><br>
                                <small><strong>Month</strong></small><br>
                                <small><strong>Bank Account Number</strong></small><br>
                                <small><strong>Designation</strong></small>
                            </th>
                            <td  colspan='1'>
                                <small>{{ $payroll->employee->first_name ?? '-' }} {{ $payroll->employee->last_name ?? '-' }}</small><br>
                                <small>HL{{ $payroll->employee->id ?? '-' }}</small><br>
                                <small>{{ $payroll->month ?? '-' }}</small><br>
                                <small>{{ $payroll->account_number ?? '-' }}</small><br>
                                <small>{{ $payroll->employee->role->name ?? '-' }}</small>
                            </td>
                            <th colspan='3'>
                                <small><strong>No of days in the Month</strong></small><br>
                                <small><strong>No of days worked</strong></small><br>
                                <small><strong>Date of joining</strong></small><br>
                                <small><strong>Leaves Balance</strong></small><br>
                                <small><strong>PF UAN Number</strong></small>
                            </th>
                            <td  colspan='1'>
                                <small>{{ $payroll->total_days ?? '-' }}</small><br>
                                <small>{{ $payroll->worked_days ?? '-' }}</small><br>
                                <small>{{ date('d/m/Y', strtotime($payroll->employee->joining_date))  ?? '-'}}</small><br>
                                <small>-</small><br>
                                <small>{{ $payroll->pf_uan_number ?? '-' }}</small>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border">
                                <small><strong>Particulars</strong></small>
                            </td>
                            <td colspan="2" class="border">
                                <small><strong>Amount Rs</strong></small>
                            </td>
                            <td colspan="3" class="border">
                                <small><strong>Deductions</strong></small>
                            </td>
                            <td colspan="1" class="border">
                                <small><strong>Amount Rs</strong></small>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border w-25"></td>
                            <td class="border">
                                <small><strong>Gross</strong></small>
                            </td>
                            <td class="border"></td>
                            <td colspan="3" class="border"></td>
                            <td colspan="1" class="border"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border">
                                <small><strong>Basic Salary</strong></small><br>
                                <small><strong>HRA</strong></small><br>
                                <small><strong>Fix Conveyance</strong></small><br>
                                <small><strong>Medical Allowance</strong></small><br>
                                <small><strong>Internet Allowance</strong></small><br>
                                <small><strong>Telephone</strong></small><br>
                                <small><strong>Prof Development</strong></small><br>
                                <small><strong>Special Allowance</strong></small><br>
                            </td>
                            <td class="border">
                                <small>{{ number_format($payroll->basic_salary) ?? '-' }}</small><br> 
                                <small>{{ number_format($payroll->hra) ?? '-' }}</small><br> 
                                <small>{{ number_format($payroll->fix_conveyance) ?? '-' }}</small><br> 
                                <small>{{ number_format($payroll->medical_alloawnce) ?? '-' }}</small><br> 
                                <small>{{ number_format($payroll->internet_alloawnce) ?? '-' }}</small><br> 
                                <small>{{ number_format($payroll->telephone) ?? '-' }}</small><br> 
                                <small>{{ number_format($payroll->professional_development) ?? '-' }}</small><br> 
                                <small>{{ number_format($payroll->special_allowance) ?? '-' }}</small><br> 
                           </td>
                            <td class="border"></td>
                            <td colspan="3" class="border">
                                <small><strong>Employee Provident Fund</strong></small><br>
                                <small><strong>Employer Provident Fund</strong></small><br>
                                <small><strong>TDS</strong></small><br>
                                <small><strong>Professional TAX</strong></small><br>
                                <small><strong>Other</strong></small><br>
                            </td>
                            <td colspan="1" class="border">
                                <small>{{ number_format($payroll->employee_pf) ?? '-' }}</small><br>
                                <small>{{ number_format($payroll->employer_pf) ?? '-' }}</small><br>
                                <small>{{ $payroll->tds ?? '-' }}</small><br>
                                <small>{{ number_format($payroll->professional_tax) ?? '-' }}</small><br>
                                <small>{{ number_format($payroll->other) ?? '-' }}</small>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="border">
                                <small><strong>Gross Salary</strong></small>
                            </td>
                            <td class="border">
                                <small>{{ number_format($payroll->gross_salary) ?? '-' }}</small>
                            </td>
                            <td class="border">-</td>
                            <td colspan="3" class="border">
                                <small><strong>Total Deductions</strong></small>
                            </td class="border">
                            <td colspan="1" class="border">
                                <small>{{ number_format($payroll->total_deduction) ?? '-' }}</small>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <small>For Hartley Labs</small><br><br><br>
                                <small>HR Department</small>
                            </td>
                            <td colspan="3">
                                <small>Net take-home Pay</small>
                            </td>
                            <td colspan="1">
                                <small><strong>Rs. {{ number_format($payroll->take_home_pay) ?? '-' }}</strong></small>
                            </td>
                        </tr>
                    </table >
                    <p><small><i>This is computer-generated report and requires no signature</i></small><br>
                    <small><i>In case of any discrepancy, please revert to the Accounts department within one week of issuance of this statement. </i></small></p>
                </div >		
            </div>
        </div>
    </body>
</html>



