<?php

namespace App\Http\Controllers;

use App\Role;
use App\Payroll;
use App\Employee;
use Illuminate\Http\Request;
use PDF;
use Mail;

class DownloadController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function payslip($id) {
        $payroll = Payroll::find($id);
        $pdf = PDF::loadview('payroll.download.payslip', ['payroll' => $payroll]);
        return $pdf->stream('employee.pdf');
    }
    
    public function sendMail($id) {
        $payroll = Payroll::find($id);
        $data["email"] = $payroll->employee->email;
        $data["title"] = "Payslip " . $payroll->month . "/" . $payroll->year;
        $data["body"] = "Payslip " . $payroll->month . "/" . $payroll->year;
        
        $pdf = PDF::loadview('payroll.download.mailpayslip', ['payroll' => $payroll]);
        Mail::send('payroll.download.mailpayslip', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });
        
        Session::flash('success', 'Payslip Sent Successfully');
        return redirect()->route('payrolls.show', ['id' => $payroll->employee_id]);
    }

}
