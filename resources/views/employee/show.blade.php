@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">Show Employee</h6></div>
                <div class="card-body">
                    <div class="mb-2">
                        <div class="dataTable_wrapper">
                            <dl class="row no-gutters mb-1">
                                <dt class="col-2 col-sm-2 text-muted">Photo</dt>
                                <dd class="col-10 col-sm-10"><img src="{{asset($employee->photo)}}" height="96" width="96" class="d-block rounded-circle img-thumbnail" alt="Profile Photo"></dd>
                                <dt class="col-2 col-sm-2 text-muted">ID</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->id ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">First Name</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->first_name ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Middle Name</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->middle_name ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Last Name</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->last_name ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Primary Phone</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->primary_phone  ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Secondary Phone</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->secondary_phone  ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Email</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->email  ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Role</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->role->name  ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Reporting Manager</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->manager->first_name  ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Joining Date</dt>
                                <dd class="col-10 col-sm-10">{{ date('d/m/Y', strtotime($employee->joining_date))  ?? '-'}}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Created At</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->created_at }}</dd>
                                <dt class="col-2 col-sm-2 text-muted">Updated At</dt>
                                <dd class="col-10 col-sm-10">{{ $employee->updated_at }}</dd>
                            </dl>
                            <hr />
                            <a class="btn btn-sm btn-primary btn-flat" href="{{ route('employees.index') }}">
                                <i class="fas fa-angle-left mr-1"></i> Go Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</div>
@endsection