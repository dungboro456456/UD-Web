@extends('layouts.shop')
@section('content')

<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Check Out</li>
    </ul>
	<div class="well well-small">
		<h1>Check Out <small class="pull-right"> {{Cart::count()}} Items are in the cart </small></h1>
	<hr class="soften">	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Unit price</th>
                  <th>Qty </th>
                  <th>Total</th>
				</tr>
              </thead>
              <tbody>
       @foreach(Cart::content() as $row)
				<tr>
                  <td><img width="100" src="{{asset('upload/images/'.$row->options->image)}}" alt=""></td>
                  <td>{{$row->name}}</td>
                  <td>${{$row->price}}</td>
                  <td>
				  <input class="span1" style="max-width:34px" placeholder="1" size="16" type="text" value="{{$row->qty}}">
				  <div class="input-append">
					<button class="btn btn-mini" type="button">-</button><button class="btn btn-mini" type="button">+</button><a href='/delete-cart/{{$row->rowId}}' class="btn btn-mini btn-danger" type="button"><span class="icon-remove"></span></a>
				</div>
				  </td>
                  <td>${{$row->price*$row->qty}}</td>
                </tr>
				@endforeach
				<tr>
					<td colspan="6" class="textalign-center">Total product:</td>
					<td colspan="6">${{Cart::total()}}</td>
				</tr>
                
              
				 
				 
				</tbody>
            </table><br>
		
		
            
			<table class="table table-bordered">
			<tbody>
                <tr><td>CHECKOUT</td></tr>
                 <tr> 
				 <td>
					<form class="form-horizontal">
					  <div class="control-group">
						<label class="span2 control-label" for="inputEmail">Name</label>
						<div class="controls">
						  <input type="text" placeholder="Country">
						</div>
					  </div>
					  <div class="control-group">
						<label class="span2 control-label" for="inputPassword">Email</label>
						<div class="controls">
						  <input type="email" placeholder="email">
						</div>
					  </div>
					  <div class="control-group">
						<div class="controls">
						  <button type="submit" class="shopBtn">Check out</button>
						</div>
					  </div>
					</form> 
				  </td>
				  </tr>
              </tbody>
            </table>		
	<a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<a href="login.html" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
@endsection