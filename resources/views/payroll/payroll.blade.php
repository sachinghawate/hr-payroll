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
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">{{ __('Payroll') }} : {{ $employee->first_name ?? '' }} {{ $employee->last_name ?? '' }}</h6></div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('payrolls.create', $employee->id) }}" class="btn btn-sm btn-primary">Create</a>
                    </div>
                    <table class="table table-bordered mb-0">
                        <thead>	
                        <th>{{ __('Month') }}</td>
                        <th>{{ __('Gross Salary') }}</th>
                        <th>{{ __('Total Days') }}</th>
                        <th>{{ __('Worked Days') }}</th>
                        <th>Action</th>
                        </thead>		

                        <tbody>
                            @if($employee->payrolls->count())
                                @foreach($employee->payrolls as $payroll)
                                <tr>		
                                    <td>{{ $payroll->month ?? '' }} / {{ $payroll->year ?? '' }}</td>
                                    <td>{{ $payroll->gross_salary ?? '' }}</td>
                                    <td>{{ $payroll->total_days ?? '' }}</td>
                                    <td>{{ $payroll->worked_days ?? '' }}</td>
                                    <td>
                                        <a href="{{ route('payslip.pdf', ['id'=>$payroll->id]) }}" class="btn btn-sm btn-info">PDF</a>
                                        <a href="{{ route('payslip.send', ['id'=>$payroll->id]) }}" class="btn btn-sm btn-primary">Mail</a>
                                        <a href="{{ route('payrolls.edit', ['id' => $payroll->id]) }}" class="btn btn-sm btn-success">Edit</a>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection