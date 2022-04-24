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
      <th scope="col">Operations</th>
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
      <td>
        <button type="button" class="btn btn-primary btn-sm px-3" id="a{{$alldata->id}}" onclick="abc('{{$alldata->id}}')" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Edit
        </button>
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
                    var name = document.getElementById("n"+k).innerHTML;
                    var email = document.getElementById("e"+k).innerHTML;
                    var phone = document.getElementById("p"+k).innerHTML;
                    var address = document.getElementById("a"+k).innerHTML;

                    document.getElementById("name").value = name;
                    document.getElementById("email").value = email;
                    document.getElementById("phone").value = phone;
                    document.getElementById("address").value = address;
                    document.getElementById("id").value = k;
                }
            </script>
            <form action="updatePersonData" method="post">
                @csrf
              <input name="id" type="hidden" id="id">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" class="form-control" name="firstName" id="name"/>
                <label class="form-label" for="name">Name</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="text" class="form-control"  name="email" id="email"/>
                <label class="form-label" for="email">Email</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" class="form-control" name="phone" id="phone" />
                <label class="form-label" for="phone">Phone</label>
              </div>

              <div class="form-outline mb-4">
                <input type="text" class="form-control"  name="address" id="address"/>
                <label class="form-label" for="address">Address</label>
              </div>

              <center><button type="submit" class="btn btn-primary btn-block w-50 mt-3">Update</button></center>
            </form>
            </div>
            </div>
            
            </div>
        </div>
        </div>


@include('script')