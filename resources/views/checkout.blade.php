@extends('layouts.app')

@section('content')
<!-- Product Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('img/breadcrumb.jpg')}}" style="background-image: url(&quot;img/breadcrumb.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="{{url('/')}}">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">        
        <div class="checkout__form">
            <h4>Billing Details</h4>
            {!! Form::model($user, ['url' => route('checkout.store')]) !!}     
                {!! Form::hidden('product_id', $product->id) !!}       
                {!! Form::hidden('total', $product->price) !!}       
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Name<span>*</span></p>
                                    {!! Form::text('name', null, ['required' => true]) !!}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email <span>*</span></p>
                                    {!! Form::email('email', null, ['required' => true, 'disabled' => true]) !!}
                                </div>
                            </div>
                        </div>                        
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            {!! Form::text('address', null, ['required' => true]) !!}                            
                        </div>
                        <div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            {!! Form::text('city', null, ['required' => true]) !!}
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            {!! Form::text('state', null, ['required' => true]) !!}
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            {!! Form::text('pincode', null, ['required' => true]) !!}
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    {!! Form::text('phone', null, ['required' => true]) !!}
                                </div>                                                
                            </div>
                            <div class="col-6">
                                <div class="checkout__input">
                                    <p>Schedule Pickup / Delivery <span>*</span></p>
                                    {!! Form::select('delivery_time', [
                                        'Any Time' => 'Any Time',
                                        '10:00 - 13:00' => '10:00 - 13:00',
                                        '13:00 - 16-00' => '13:00 - 16-00',
                                        '16:00 - 19-00' => '16:00 - 19-00'
                                    ], null, ['required' => true]) !!}
                                </div>                                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul>
                                <li>{{$product->name}} <span>${{$product->price}} / Kg</span></li>

                                <li>Quantity <span>{!! Form::number('quantity', 1, ['class' => 'qty', 'style' => 'width:50px;background:transparent; border:1px solid #ddd', 'data-price' => $product->price, 'min' => 1]) !!}</span></li>                                
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>${{$product->price}}</span></div>
                            <div class="checkout__order__total">Total <span>${{$product->price}}</span></div>
                            @if($user->role != 'User')
                            <label>
                                Send Exchange Proposal
                                <select name="exchange_product_id" id="" class="form-control w-100">
                                    <option value="">Select Product to Exchange</option>
                                    @foreach ($my_products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>                                        
                                    @endforeach
                                </select>
                                <span class="checkmark"></span>
                            </label>
                            @endif

                             {{-- <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            {!! Form::submit('Place Order', ['class' => 'site-btn']) !!}                        
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</section>

@endsection