@extends('layouts.app')

@section('content')
<!-- Product Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('img/breadcrumb.jpg')}}" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thankyou</h2>                    
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">        
        <div class="checkout__form">
            <div>
              
            </div>
            <div class="row">
                <div class="col-6 mt-4">
                    <h4>Billing Details</h4>
                    <strong>Ordered Date:</strong> {{$order->created_at->format('D, d F Y')}}
                    <br>
                    <strong>Status: </strong> {{$order->status}}                    
                </div>
                <div class="col-6 mt-4">
                    <h4>Total</h4>
                    <h5>{{$order->product->name}} <small>x {{$order->quantity}}</small>  = {{$order->total}}</h5>                    
                    @if($order->exchange) 
                        <h5>Exchange with {{$order->exchange->name}}</h5>                    
                    @endif
                </div>
                <div class="col-6 mt-4">
                    <h4>Billing Address</h4>
                    <p><i>{{$order->user->name}}</i></p>
                    <p><i>{{$order->address}}</i></p>
                    <p><i>{{$order->user->phone}}</i></p>

                </div>
                <div class="col-6 mt-4">
                    <h4>Seller Details</h4>
                    <p><i>{{$order->product->user->name}}</i></p>
                    <p><i>{{$order->product->user->address . ' ' . $order->product->user->city .' '. $order->product->user->state .' '. $order->product->user->pincode}}</i></p>
                    <p>Phone: {{$order->product->user->phone}}</p>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection