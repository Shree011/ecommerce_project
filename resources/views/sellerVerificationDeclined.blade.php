@include('links')
@include('sellerNav')

<h2 style="margin-top:5%"></h2>
<div class="container">

<div class="table-responsive" style="margin-top: 5%">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Description</th>
      <th scope="col">Reason</th>
      <th scope="col">Status</th>
    </tr>
  </thead>

  <tbody>
  @foreach ($data as $alldata)
    <tr>
      <th scope="row">{{$alldata->id}}</th>
      <td id="n{{$alldata->id}}">{{$alldata->productName}}</td>
      <td id="e{{$alldata->id}}">{{$alldata->price}}</td>
      <td id="p{{$alldata->id}}">{{$alldata->quantity}}</td>
      <td id="a{{$alldata->id}}">{{$alldata->description}}</td>
      <td id="r{{$alldata->id}}">{{$alldata->reason}}</td>
      <td>
        Declined
      </td>
    </tr>

  @endforeach
  </tbody>
</table>
</div>  
</div>
@include('script')