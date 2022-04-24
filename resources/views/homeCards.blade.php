<div class="row row-cols-1 row-cols-sm-1 row-cols-md-3 row-cols-lg-4 g-5 w-100 mx-auto" style="margin-bottom: 10rem; background:transparent; transition-duration:3s; ">
@foreach ( $cardsData as $alldata )
  <a href="homeBuyView/{{$alldata->image}}">
  <div class="col shadow-5 mb-5 text-dark">
    <div class="card h-100">
      <img
        height="100%"
        src="storage/images/products/{{$alldata->image}}"
        class="card-img-top"
        alt="..."
      />
      
      <div class="card-body">
        <h5 class="card-title">{{$alldata->productName}}</h5>
        ₹{{$alldata->sellPrice}}
        <p class="card-text">
          {{$alldata->description}}
        </p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Review here</small>
      </div>
    </div>
  </div>
  </a>
@endforeach
</div>