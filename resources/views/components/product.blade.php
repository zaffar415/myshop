<div class="product__item">
    <div class="product__item__pic set-bg" data-setbg="{{asset('uploads/product/'. $product->image)}}">
        <ul class="product__item__pic__hover">            
            <li><a href="{{route('checkout', $product->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
        </ul>
    </div>
    <div class="product__item__text">
        <h6>{{$product->name}}</h6>
        <h5>${{$product->price}}</h5>
    </div>
</div>