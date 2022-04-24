@include('links')
@include('adminSideNav')

@if (session('personUpdateSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('personUpdateSuccess') }}
</div>
@endif

@if (session('personUpdateerror'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
     {{ session('personUpdateerror') }}
</div>
@endif


<div>
<div class="container mt-5">
<table class="table table-responsive table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Pass</th>
      <th scope="col">Phone no</th>
      <th scope="col">Address</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>

  <tbody>
  @foreach ($data as $alldata)
    <tr>
      <th scope="row">{{$alldata->id}}</th>
      <td id="n{{$alldata->id}}">{{$alldata->name}}</td>
      <td id="e{{$alldata->id}}">{{$alldata->email}}</td>
      <td id="pass{{$alldata->id}}">{{$alldata->pass}}</td>
      <td id="p{{$alldata->id}}">{{$alldata->phone}}</td>
      <td id="a{{$alldata->id}}">{{$alldata->address}}</td>
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
                    var pass = document.getElementById("pass"+k).innerHTML;
                    var phone = document.getElementById("p"+k).innerHTML;
                    var address = document.getElementById("a"+k).innerHTML;

                    document.getElementById("form3Example1").value = name;
                    document.getElementById("form3Example3").value = email;
                    document.getElementById("form3Example4").value = pass;
                    document.getElementById("form3Example5").value = phone;
                    document.getElementById("form3Example6").value = address;
                    document.getElementById("id").value = k;
                }
            </script>
            <form action="updatePersonData" method="post">
            @csrf
            <input name="id" type="hidden" id="id">
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example1" class="form-control" name="firstName" />
                    <label class="form-label" for="form3Example1">First name</label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" class="form-control" name="email" />
                <label class="form-label" for="form3Example3">Email address</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form3Example4" class="form-control" name="pass" />
                <label class="form-label" for="form3Example4">Password</label>
              </div>

              <div class="row mb-4">
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example5" class="form-control" name="phone" />
                    <label class="form-label" for="form3Example5">Phone</label>
                  </div>
                </div>
                <div class="col">
                  <div class="form-outline">
                    <input type="text" id="form3Example6" class="form-control" name="address" />
                    <label class="form-label" for="form3Example6">Address</label>
                  </div>
                </div>
              </div>
              <!-- Checkbox -->


              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>

              <!-- Register buttons -->
            </form>
            
            </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                Close
                </button>
            </div>
            </div>
        </div>
        </div>

@include('script')