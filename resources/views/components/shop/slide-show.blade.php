
<div class="well np">
    <div id="myCarousel" class="carousel slide homCar">
        <div class="carousel-inner">

            @foreach($images as $image)


          <div class="item">
            <img style="width:100%" src="/upload/images/{{$image->image}}" alt="bootstrap templates">
            <div class="carousel-caption">
                  <h4>Bootstrap templates integration</h4>
                  <p><span>Compitable to many more opensource cart</span></p>
            </div>
          </div>


          @endforeach
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
      </div>
    </div>