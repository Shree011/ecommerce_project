@include('links')
@include('adminSideNav')
<div class="container mt-5">
<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone no</th>
      <th scope="col">Address</th>
      <th scope="col">Store</th>
    </tr>
  </thead>
<?php $i = 1; ?>
  <tbody>
  @foreach ($data as $alldata)
    <tr>
      <th scope="row">{{$i}}</th>
      <td id="n{{$alldata->id}}">{{$alldata->name}}</td>
      <td id="e{{$alldata->id}}">{{$alldata->email}}</td>
      <td id="p{{$alldata->id}}">{{$alldata->phone}}</td>
      <td id="a{{$alldata->id}}">{{$alldata->address}}</td>
      <td id="st{{$alldata->id}}">{{$alldata->storeName}}</td>

    </tr>
    <?php $i++; ?>
    @endforeach
  </tbody>
</table>
</div>  
</div>


@include('script')