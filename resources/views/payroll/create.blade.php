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
                    {!! Form::open(['route' => ['payrolls.store', $employee->id], 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="form-group @if($errors->has('month')) has-error @endif">
                                {!! Form::label('Month') !!}
                                {!! Form::select('month', ['January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December'], null, ['class'=>(($errors->has("month"))?"is-invalid":"").' form-control ', 'placeholder' => 'Please select']) !!}
                                @if ($errors->has('month'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('month') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-6 col-md-6">
                            <div class="form-group @if($errors->has('year')) has-error @endif">
                                {!! Form::label('Year') !!}
                                {!! Form::select('year', ['2019' => '2019', '2020' => '2020'], null, ['class'=>(($errors->has("year"))?"is-invalid":"").' form-control ', 'placeholder' => 'Please select']) !!}
                                @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('year') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="form-group @if($errors->has('total_days')) has-error @endif">
                                {!! Form::label('No of days in the Month') !!}
                                {!! Form::number('total_days', '30', ['class'=>(($errors->has("total_days"))?"is-invalid":"").' form-control ', 'placeholder' => 'No of days in the Month']) !!}
                                @if ($errors->has('total_days'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('total_days') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-6 col-md-6">
                            <div class="form-group @if($errors->has('worked_days')) has-error @endif">
                                {!! Form::label('No of days Worked') !!}
                                {!! Form::number('worked_days', '22', ['class'=>(($errors->has("worked_days"))?"is-invalid":"").' form-control ', 'placeholder' => 'No of days Worked']) !!}
                                @if ($errors->has('worked_days'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('worked_days') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="form-group @if($errors->has('pf_uan_number')) has-error @endif">
                                {!! Form::label('PF UAN Number') !!}
                                {!! Form::number('pf_uan_number', null, ['class'=>(($errors->has("pf_uan_number"))?"is-invalid":"").' form-control ', 'placeholder' => 'PF UAN Number']) !!}
                                @if ($errors->has('pf_uan_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('pf_uan_number') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-6 col-md-6">
                            <div class="form-group @if($errors->has('account_number')) has-error @endif">
                                {!! Form::label('Bank Account Number') !!}
                                {!! Form::number('account_number', null, ['class'=>(($errors->has("account_number"))?"is-invalid":"").' form-control ', 'placeholder' => 'Bank Account Number']) !!}
                                @if ($errors->has('account_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('account_number') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <div class="form-group @if($errors->has('gross_salary')) has-error @endif">
                                {!! Form::label('Gross Salary') !!}
                                {!! Form::number('gross_salary', null, ['class'=>(($errors->has("gross_salary"))?"is-invalid":"").' form-control ', 'placeholder' => 'Gross Salary']) !!}
                                @if ($errors->has('gross_salary'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('gross_salary') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <hr>
                    {!! Form::submit('Create',['class' => 'btn btn-sm btn-primary']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
