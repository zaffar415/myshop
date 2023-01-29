@extends('layouts.dashboard')


@section('content')

        <div class="container-fluid px-4">
            <h1 class="mt-4">Product</h1>
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
                    {!! Form::model(isset($product) ? $product : null, $formAttributes) !!}
                        <div class="form-group mb-4">
                            <label for="">
                                Name
                            </label>
                            {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                    
                        <div class="form-group mb-4">
                            <label for="">
                                Image
                            </label>
                            @if(isset($product) && $product) 
                            {!! Form::file('image', ['class' => 'form-control']) !!}                        
                            @else 
                            {!! Form::file('image', ['class' => 'form-control', 'accept' => 'image/*', 'required' => true]) !!}                        
                            @endif
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Description
                            </label>
                            {!! Form::textarea('description', null, ['class' => 'form-control', 'required' => true, 'rows' => 4]) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Price
                            </label>
                            {!! Form::number('price', null, ['class' => 'form-control', 'required' => true]) !!}
                        </div>
                        <div class="form-group mb-4">
                            <label for="">
                                Category
                            </label>
                            {!! Form::select('category', [
                                'Fruit' => 'Fruit',
                                'Vegetables' => 'Vegetables'
                            ], ['class' => 'form-control', 'required' => true]) !!}
                        </div>                        
                        <div class="form-group mb-4">
                            @if(isset($product) && $product) 
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                            @else 
                            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                            @endif
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection