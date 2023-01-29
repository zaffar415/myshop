@extends('layouts.dashboard')


@section('content')

        <div class="container-fluid px-4">
            <h1 class="mt-4">Orders</h1>
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
                                <th>Product</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Total</th>                                
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Product</th>
                                <th>Username</th>
                                <th>Address</th>
                                <th>Total</th>                                
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if($orders)
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <strong>{{$order->product->name}}</strong> x <small >{{$order->quantity}} qty</small>
                                        </td>
                                        <td>{{$order->user->name}}</td>
                                        <td>
                                            {{$order->address}}
                                            <div><strong>Phone:</strong> {{$order->user->phone}}</div>
                                            <div><strong>Pickup/Delivery Time:</strong> {{$order->delivery_time}}</div>
                                            @if($order->exchange)
                                            <div style="background:#aaa; padding:0px 5px; border-radius:4px;">
                                                <p>User would like to exchange with "{{$order->exchange->name}}"</p>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            ${{$order->total}}                                            
                                        </td>                                                                                
                                        <td>
                                            <div class="flex">
                                                {!! Form::open(['url' => route('order.update', $order->id), 'method' => 'PUT', 'onchange' => 'this.submit()']) !!}
                                                    {!! Form::select('status', [
                                                        'Processing' => 'Processing',
                                                        'Completed' => 'Completed',
                                                        'Cancelled' => 'Cancelled'
                                                    ], $order->status, ['class' => 'form-control']) !!}
                                                {!! Form::close() !!}
                                                {{-- <a href="{{route('order.edit', $order->id)}}" class="btn btn-primary">Edit</a> --}}
                                                {{-- {!! Form::open(['url' => route('order.destroy', $product->id), 'method' => 'DELETE']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                                {!! Form::close() !!}                                             --}}
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