@include('links')
@include('adminSideNav')

<div class="container mt-5">
<div class="table-responsive">
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product Name</th>
      <th scope="col">Price</th>
      <th scope="col">Quantity</th>
      <th scope="col">Category</th>
      <th scope="col">Image</th>
      <th scope="col">Description</th>
      <th scope="col"></th>
      
    </tr>
  </thead>

  <tbody>
  @foreach ($data as $alldata)
    <tr>
      <th scope="row">{{$alldata->id}}</th>
      <td id="n{{$alldata->id}}">{{$alldata->productName}}</td>
      <td id="e{{$alldata->id}}">{{$alldata->price}}</td>
      <td id="p{{$alldata->id}}">{{$alldata->quantity}}</td>
      <td id="p{{$alldata->id}}">{{$alldata->quantity}}</td>
      <td width="10%" id="i{{$alldata->id}}"><img style="width: 100%" src="storage\images\products\{{$alldata->image}}" alt="abc"></img></td>
      <td id="a{{$alldata->id}}">{{$alldata->description}}</td>
      <td>
        
        <button type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal2" onclick="abcc('{{$alldata->id}}')" class="btn btn-sm btn-primary">Accept</button>
        <button type="button" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="abc('{{$alldata->id}}')" class="btn btn-sm btn-danger">Decline</button>
      </td>

    </tr>

    @endforeach
  </tbody>
</table>
</div>  
</div>

            <!-- Modal -->
        <div
        class="modal fade"
        id="exampleModal2"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel"><h4 class="w3-center pb-1 ">Selling Price</h4></div>
                <button
                type="button"
                class="btn-close"
                data-mdb-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
            <div class="justify-content-center">
            <script>
                function abcc(k){
                    document.getElementById("id2").value = k;

                }
            </script>
                <form action="acceptProduct" method="get">
                    <input type="hidden" value="" name="opr" id="id2">
                    <div class="row">
                        <div class="col-8">
                            <div class="form-outline">
                                <input type="number" id="form1" class="form-control" name="sellPrice" required />
                                <label class="form-label" for="form1">Selling price</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">Accept</button>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            </div>
        </div>
        </div>



 
            <!-- Modal -->
        <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel"><h4 class="w3-center pb-1 ">Edit Details</h4></div>
                <button
                type="button"
                class="btn-close"
                data-mdb-dismiss="modal"
                aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
            <div class="justify-content-center">
            <script>
                function abc(k){
                    document.getElementById("id").value = k;
                    /* var name = document.getElementById("n"+k).innerHTML;
                    var email = document.getElementById("e"+k).innerHTML;
                    var phone = document.getElementById("p"+k).innerHTML;
                    var address = document.getElementById("a"+k).innerHTML;

                    document.getElementById("name").value = name;
                    document.getElementById("email").value = email;
                    document.getElementById("phone").value = phone;
                    document.getElementById("address").value = address; */
                }
            </script>
                <form action="declineProduct" method="get" >
                    <input type="hidden" value="" name="opr" id="id">
                    <div class="form-outline">
                        <textarea class="form-control" id="textAreaExample" rows="4" name="reason" require></textarea>
                        <label class="form-label" for="textAreaExample">Decline Reason</label>
                    </div>
                    <button type="submit" class="btn btn-danger offset-10 col-2">Decline</button>
                </form>
            </div>
            </div>
            </div>
        </div>
        </div>
@include('script')
