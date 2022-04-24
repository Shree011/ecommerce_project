@include('links')
@include('navbar')
<?php $data = session('orders');?>
<div class="container mt-4">
<table class="table table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <?php $i = 1; $k = 1; ?>
  <tbody>
  @foreach ($data as $alldata)
  <?php
/*     if($k != 7){
      $k++;
      continue;
    } */
    ?>
    
    <tr>
      <th scope="row">{{$i}}</th>
      <td id="p{{$alldata->id}}" width="10%"><img style="width: 100%" src="storage\images\products\{{$alldata->image}}" alt="abc"></td>
      <td id="n{{$alldata->id}}">{{$alldata->productName}}</td>
      <td id="n{{$alldata->id}}">{{$alldata->sellPrice}}</td>
      <td id="e{{$alldata->id}}">{{$alldata->quantityy}}</td>
      <td id="a{{$alldata->id}}">{{$alldata->total}}</td>
      <td id="a{{$alldata->id}}">{{$alldata->buyingStatus}}</td>
<!--       <td>
        <button type="button" class="btn btn-primary btn-sm px-3" id="a{{$alldata->id}}" onclick="abc('{{$alldata->id}}')" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Cancel
        </button>
      </td> -->
    </tr> 

    <?php $i++; $k=1;?>
    @endforeach
  </tbody>
</table>
</div>
@include('script')