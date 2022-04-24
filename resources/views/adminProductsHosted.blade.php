@include('links')
@include('adminSideNav')

<div class="container mt-5">
<div class="table-responsive" style="margin-top: 5%">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product</th>
      <th scope="col">Buy</th>
      <th scope="col">Sell</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <!-- <th scope="col">Operations</th> -->
    </tr>
  </thead>

  <tbody>
  @foreach ($data as $alldata)
    <tr>
      <th scope="row">{{$alldata->id}}</th>
      <td id="n{{$alldata->id}}">{{$alldata->productName}}</td>
      <td id="e{{$alldata->id}}">{{$alldata->buyPrice}}</td>
      <td id="p{{$alldata->id}}">{{$alldata->sellPrice}}</td>
      <td id="a{{$alldata->id}}">{{$alldata->quantity}}</td>
      <td id="st{{$alldata->id}}">{{$alldata->category}}</td>
<!--       <td>
        <button type="button" class="btn btn-primary btn-sm px-3" id="a{{$alldata->id}}" onclick="abc('{{$alldata->id}}')" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Edit
        </button>
      </td> -->
    </tr>

    @endforeach
  </tbody>
</table>
</div>  
</div>


@include('script')