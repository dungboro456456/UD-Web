
<div class="span2">

    <h5>Products</h5>
    @foreach($links as $links)
    <a href="/pages/{$link->slug}">{{$links->title}}</a><br>
  @endforeach
     </div>