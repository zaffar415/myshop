@extends('layouts.dashboard')


@section('content')

        <div class="container-fluid px-4">
            <h1 class="mt-4">User</h1>
            {{-- <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Tables</li>
            </ol>             --}}
            <div class="card mb-4">
                {{-- <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    DataTable Example
                </div> --}}
                <div class="card-body">
                    {!! Form::model($user, ['url' => route('user.update', $user->id), 'method' => 'PUT']) !!}
                        <div class="form-group mb-4">
                            <label for="">
                                Name
                            </label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true, 'disabled' => true]) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Email
                            </label>
                            {!! Form::email('email', null, ['class' => 'form-control', 'required' => true, 'disabled' => true]) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Address
                            </label>
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                City
                            </label>
                            {!! Form::text('city', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                State
                            </label>
                            {!! Form::text('state', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Pincode
                            </label>
                            {!! Form::text('pincode', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Phone
                            </label>
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Role
                            </label>
                            {!! Form::select('role', ['Admin' => 'Admin', 'Farmer' => 'Farmer', 'User' => 'User'], null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group mb-4">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection