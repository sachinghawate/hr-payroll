<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Role;
use Illuminate\Http\Request;
use Session;

class EmployeeController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $employees = Employee::paginate(5);
        return view('employee.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::pluck('name', 'id');
        $managers = Employee::where('role_id', '=', '1')->pluck('first_name', 'id');
        if ($roles->count() == 0) {
            Session::flash('success', 'you must have at least 1 role created before attempting to create an employee');
            return redirect()->back();
        }
        return view('employee.create', ['managers' => $managers, 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'primary_phone' => 'required',
            'email' => 'required|unique:employees,email',
            'role_id' => 'required',
            'manager_id' => 'required',
            'joining_date' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:2048',
                ], [
            'first_name.required' => 'Please enter First Name',
            'last_name.required' => 'Please enter Last Name',
            'primary_phone.required' => 'Please enter Primary Phone',
            'email.required' => 'Enter enter Email',
            'email.unique' => 'Email already exist',
            'role_id.required' => 'Please select Role',
            'manager_id.required' => 'Please select Manager',
            'joining_date' => 'Please enter Joining Date'
        ]);

        $form_data = [
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'primary_phone' => $request->primary_phone,
            'secondary_phone' => $request->secondary_phone,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'manager_id' => $request->manager_id,
            'joining_date' => $request->joining_date
        ];
        
        if($request->photo) {
            $file_name = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('uploads'), $file_name);
            $photo = 'uploads/'. $file_name;
            $form_data['photo'] = $photo;
        }
        
        $employee = Employee::create($form_data);
        
        //$payroll = new Payroll;
        //$payroll->employee_id = $employee->id;
        //$payroll->save();
        $employee->save();


        $request->session()->flash('success', 'New Employee created');
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return view('employee.show', ['employee' => Employee::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $employee = Employee::find($id);
        $managers = Employee::where('role_id', '=', '1')->pluck('first_name', 'id');
        $roles = Role::pluck('name', 'id');
        return view('employee.edit', ['employee' => $employee, 'managers' => $managers, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $employee = Employee::findOrFail($id);
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'first_name' => 'required',
            'primary_phone' => 'required',
            'email' => 'required|unique:employees,email,' . $employee->id,
            'role_id' => 'required',
            'manager_id' => 'required',
            'joining_date' => 'required',
            'photo' => 'mimes:jpg,jpeg,png|max:2048',
                ], [
            'first_name.required' => 'Please enter First Name',
            'last_name.required' => 'Please enter Last Name',
            'primary_phone.required' => 'Please enter Primary Phone',
            'email.required' => 'Enter enter Email',
            'email.unique' => 'Email already exist',
            'role_id.required' => 'Please select Role',
            'manager_id.required' => 'Please select Manager',
            'joining_date' => 'Please select Joining Date'
        ]);

        $employee->first_name = $request->first_name;
        $employee->middle_name = $request->middle_name;
        $employee->last_name = $request->last_name;
        $employee->primary_phone = $request->primary_phone;
        $employee->secondary_phone = $request->secondary_phone;
        $employee->email = $request->email;
        $employee->role_id = $request->role_id;
        $employee->manager_id = $request->manager_id;
        $employee->joining_date = $request->joining_date;
        
        if($request->photo) {
            $file_name = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('uploads'), $file_name);
            $photo = 'uploads/'. $file_name;
            $employee->photo = $photo;
        }
        
        $employee->save();

        $request->session()->flash('success', 'Employee Information Updated');
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        Session::flash('success', 'Employee deleted');
        return redirect()->route('employees.index');
    }

}
