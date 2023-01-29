@extends('layouts.dashboard')


@section('content')

        <div class="container-fluid px-4">
            <h1 class="mt-4">Users</h1>
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
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>                                
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($products)
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <img src="{{asset('uploads/product/'. $product->image)}}" alt="">
                                        </td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category}}</td>
                                        <td>{{$product->price}}</td>                                                                                
                                        <td>
                                            <div class="flex">
                                                <a href="{{route('product.edit', $product->id)}}" class="btn btn-primary">Edit</a>
                                                {!! Form::open(['url' => route('product.destroy', $product->id), 'method' => 'DELETE']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}                                            
                                            </div>
                                        </td>
                                    </tr>                                    
                                @endforeach
                            @endif                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection