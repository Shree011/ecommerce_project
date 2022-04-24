<?php $i=1; ?>
<div class="w-100"  style="height: 40% !important; z-index:-100000;">
<div id="carouselExampleControls" class="carousel slide m-0" data-mdb-ride="carousel">
  <div class="carousel-inner">
    @foreach ( $carouselData as $alldata )
    @if( $i==1 )
    <div class="carousel-item active">
      <img
        src="storage/images/adminAdvertise/{{$alldata->addImage}}"
        class="d-block w-100"
        style="height: 170% !important;"
        alt="..."
      />
    </div>
    <?php $i++; ?>
    @else
    <div class="carousel-item">
      <img
        src="storage/images/adminAdvertise/{{$alldata->addImage}}"
        class="d-block w-100"
        style="height: 170% !important;"
        alt="..."
      />
    </div>
    <?php $i++; ?>
    @endif
    @endforeach
  </div>
  <button
    class="carousel-control-prev"
    type="button"
    data-mdb-target="#carouselExampleControls"
    data-mdb-slide="prev"
    style="height: 50%;;"
  >
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button
    class="carousel-control-next"
    type="button"
    data-mdb-target="#carouselExampleControls"
    data-mdb-slide="next"
    style="height: 50%;"
  >
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</div>