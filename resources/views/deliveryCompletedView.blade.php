@include('links')
@include('deliveryNavbar')



<?php $data = session('CompletedOrdersData');?>

<table class="container mt-5 table center table-striped table-hover table-responsive">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Product</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total</th>
      <th scope="col">Address</th>
      <th scope="col">Contact</th>
      <th scope="col">ORDERS</th>
      
    </tr>
  </thead>
  <?php $i = 1; ?>
  <tbody>
  @foreach ($data as $alldata)
    
    <tr>
      <th scope="row">{{$i}}</th>
      <td id="p{{$alldata->id}}" width="10%"><img style="width: 100%" src="storage\images\products\{{$alldata->deliveryImage}}" alt="abc"></td>
      <td id="n{{$alldata->id}}">{{$alldata->deliveryProductName}}</td>
      <td id="n{{$alldata->id}}">{{$alldata->deliveryPrice}}</td>
      <td id="e{{$alldata->id}}">{{$alldata->deliveryQuantity}}</td>
      <td id="e{{$alldata->id}}">₹{{$alldata->deliveryTotal}}</td>
      <td id="a{{$alldata->id}}">{{$alldata->address}}</td>
      <td id="ph{{$alldata->id}}">{{$alldata->phone}}</td>
      <td id="d{{$alldata->id}}">Delivered</td>
    </tr>
    <?php $i++; ?>
    @endforeach
  </tbody>
</table>
@if($i == 1)
    <div class=" text-center bold mt-5">No Completed Orders</div>
    @endif
@include('script')