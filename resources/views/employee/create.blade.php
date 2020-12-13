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
                <div class="card-header py-3"><h6 class="m-0 font-weight-bold text-primary">{{ __('Create Employee') }}</h6></div>
                <div class="card-body">
                    {!! Form::open(['route' => 'employees.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('first_name')) has-error @endif">
                                {!! Form::label('First Name') !!}
                                {!! Form::text('first_name', null, ['class'=>(($errors->has("first_name"))?"is-invalid":"").' form-control ', 'placeholder' => 'First Name']) !!}
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('first_name') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-4 col-md-4">
                            <div class="form-group">
                                {!! Form::label('Middle Name') !!}
                                {!! Form::text('middle_name', null, ['class'=>'form-control', 'placeholder' => 'Middle Name']) !!}
                                @if ($errors->has('middle_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('middle_name') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('last_name')) has-error @endif">
                                {!! Form::label('Last Name') !!}
                                {!! Form::text('last_name', null, ['class'=>(($errors->has("last_name"))?"is-invalid":"").' form-control ', 'placeholder' => 'Last Name']) !!}
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('last_name') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>							
                    </div>

                    <div class="row">
                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('primary_phone')) has-error @endif">
                                {!! Form::label('Primary Phone') !!}
                                {!! Form::text('primary_phone', null, ['class'=>(($errors->has("primary_phone"))?"is-invalid":"").' form-control ', 'placeholder' => 'Primary Phone']) !!}
                                @if ($errors->has('primary_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('primary_phone') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-4 col-md-4">
                            <div class="form-group">
                                {!! Form::label('Secondary Phone') !!}
                                {!! Form::text('secondary_phone', null, ['class'=>'form-control', 'placeholder' => 'Secondary Phone']) !!}
                                @if ($errors->has('secondary_phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('secondary_phone') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('email')) has-error @endif">
                                {!! Form::label('Email') !!}
                                {!! Form::email('email', null, ['class'=>(($errors->has("email"))?"is-invalid":"").' form-control ', 'placeholder' => 'Email']) !!}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('email') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('role_id')) has-error @endif">
                                {!! Form::label('Roles') !!}
                                {!! Form::select('role_id', $roles, null, ['class'=>(($errors->has("role_id"))?"is-invalid":"").' form-control ', 'placeholder' => 'Please select']) !!}
                                @if ($errors->has('role_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('role_id') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('manager_id')) has-error @endif">
                                {!! Form::label('Reporting Manager') !!}
                                {!! Form::select('manager_id', $managers, null, ['class'=>(($errors->has("manager_id"))?"is-invalid":"").' form-control ', 'placeholder' => 'Please select']) !!}
                                @if ($errors->has('manager_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('manager_id') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('joining_date')) has-error @endif">
                                {!! Form::label('Joining Date') !!}
                                {!! Form::date('joining_date', null, ['class'=>(($errors->has("joining_date"))?"is-invalid":"").' form-control ']) !!}
                                @if ($errors->has('joining_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('joining_date') !!}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4 col-md-4">
                            <div class="form-group @if($errors->has('photo')) has-error @endif">
                                {!! Form::file('photo', null, ['class'=>(($errors->has("photo"))?"is-invalid":"").' form-control ']) !!}
                                @if ($errors->has('photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{!! $errors->first('photo') !!}</strong>
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