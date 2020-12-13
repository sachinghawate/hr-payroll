@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('success'))
            <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="card">
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">{{ __('Employee - Lists') }}</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('employees.create') }}" class="btn btn-sm btn-primary">Create</a>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">Full Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($employees))
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id ?? ''}}</td>
                                <td>{{ $employee->first_name ?? ''}} {{ $employee->last_name ?? ''}}</td>
                                <td>{{ $employee->email ?? ''}}</td>
                                <td>{{ $employee->role->name }}</td>
                                <td>
                                    <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-success">Show</a>
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    {!! Form::open(['route' => ['employees.destroy', $employee->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                                    {!! Form::close() !!}
                                    <a href="{{ route('payrolls.show', $employee->id) }}" class="btn btn-sm btn-info">Payroll</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="5" class="text-center">No Records Found</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="text-center my-3">{{ $employees->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection