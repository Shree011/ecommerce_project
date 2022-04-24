@include('links')
@include('navbar')
<body style="background: rgb(225, 234, 234);">
<div class="container">
<div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-5 mx-auto mt-3" style="margin-bottom: 10rem; background:transparent; transition-duration:3s;">
@foreach ( $data as $alldata )
  <a href="homeBuyView/{{$alldata->image}}">
  <div class="card mb-3 text-dark h-100" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img
          src="storage/images/products/{{$alldata->image}}"
          alt="..."
          class="img-fluid"
        />
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{$alldata->productName}}</h5>
          ₹{{$alldata->sellPrice}}
          <p class="card-text">
              {{$alldata->description}}
          </p>
          <p class="card-text">
            <small class="text-muted">Review here</small>
          </p>
        </div>
      </div>
    </div>
  </div>
  </a>
@endforeach
</div>
</div>
</body>
@include('script')

