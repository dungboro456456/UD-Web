@php
	$products1=$products->slice(0,4);
	$products2=$products->slice(4);
@endphp
<div class="well well-small">
<h3>{{$title}} </h3>
	<hr class="soften"/>
		<div class="row-fluid">
		<div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
			<div class="item active">
			  <ul class="thumbnails">

				@foreach($products1 as $product1)
				<li class="span3">
				  <div class="thumbnail">
					<a class="zoomTool" href="/products/{{$product1->slug}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a  href="/products/{{$product1->slug}}"><img src="/upload/images/{{$product1->image}}" alt=""></a>
				  </div> 
				</li>
				@endforeach

			  </ul>
			  </div>
		   <div class="item">
		  <ul class="thumbnails">

			@foreach($products2 as $product2)
				<li class="span3">
				  <div class="thumbnail">
					<a class="zoomTool" href="/products/{{$product2->slug}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a  href="/products/{{$product2->slug}}"><img src="/upload/images/{{$product2->image}}" alt=""></a>
				  </div> 
				</li>
				@endforeach

		  </ul>
		  </div>
		   </div>
		  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
</div>