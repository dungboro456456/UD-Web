@extends('layouts.shop')
@section('content')
<x-shop.slide-show/>
<x-shop.special-product-box type="new" title="New Products" />

<div class="well well-small">
	<h3>Our Products </h3>
		<div class="row-fluid">
		  <ul class="thumbnails">
            @foreach ($products as $product)
                
            
			<li class="span3" style='height:400px;margin:1.5.px'>
			  <div class="thumbnail" style='height:400px'>
				<a href="/products/{{$product->slug}}" class="overlay"></a>
				<a class="zoomTool" href="product_details.html" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="/products/{{$product->slug}}"><img src="/upload/images/{{$product->image}}" alt=""></a>
				<div class="caption cntr">
					<p>{{$product->product_name}}</p>
					<p><strong>{{$product->price}}</strong></p>
					<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
            @endforeach
		  </ul>
		</div>
	</div>
    @endsection('content')