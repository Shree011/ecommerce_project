@include('links')
@include('adminSideNav')

@if (session('AddingAdvertise'))
<div class="alert alert-success alert-dismissible fade show w-100" role="alert">
     {{ session('AddingAdvertise') }}
</div>
@endif

<form class="w-50 mx-auto mt-5" enctype="multipart/form-data" method="post" action="adminAddAddvertise">
@csrf
<label class="form-label" for="customFile">Default file input example</label>
<input type="file" class="form-control" id="customFile" name="image"/>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block my-4">Add</button>

<?php $i = 1; ?>
</form>
<div>
<div class="container mt-5">
<table class="table table-responsive table-striped table-hover">
  <thead>
    <tr>
      <th class="text-center" scope="col">#</th>
      <th class="text-center" scope="col">Image</th>
      <th class="text-center" scope="col">Date</th>
      <th class="text-center" scope="col">Operations</th>
    </tr>
  </thead>

  <tbody>
  @foreach ($data as $alldata)
    <tr>
      <th class="text-center" scope="row">{{$i}}</th>
      <td class="text-center" width="10%" id="n{{$alldata->id}}"><img style="width: 100%" src="storage\images\adminAdvertise\{{$alldata->addImage}}" alt="abc"></img></td>
      <td class="text-center" id="e{{$alldata->id}}">{{$alldata->created_at}}</td>
      <td class="text-center">
        <button type="button" class="btn btn-primary btn-sm px-3 mx-5" id="a{{$alldata->id}}" onclick="abc('{{$alldata->id}}')" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
            Update
        </button>
        <button type="button" class="btn btn-danger btn-sm px-3 mx-5" id="a{{$alldata->id}}" onclick="abc('{{$alldata->id}}')" data-mdb-toggle="modal" data-mdb-target="#exampleModal2">
            Delete
        </button>
      
      </td>
      
    </tr>
    <?php $i++; ?>
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
                <div class="modal-title" id="exampleModalLabel"><h4 class="w3-center pb-1 ">Update Image</h4></div>
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
                        /* var name = document.getElementById("n"+k).innerHTML;
                        var email = document.getElementById("e"+k).innerHTML;
                        var pass = document.getElementById("pass"+k).innerHTML;
                        var phone = document.getElementById("p"+k).innerHTML;
                        var address = document.getElementById("a"+k).innerHTML;

                        document.getElementById("form3Example1").value = name;
                        document.getElementById("form3Example3").value = email;
                        document.getElementById("form3Example4").value = pass;
                        document.getElementById("form3Example5").value = phone;
                        document.getElementById("form3Example6").value = address; */
                        document.getElementById("id").value = k;
                    }
                </script>
                <form action="adminUpdateAddvertise" class="w-50 mx-auto" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <label class="form-label" for="customFile">Choose Image</label>
                    <input type="file" class="form-control" id="customFile" name="image"/>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block my-4">Update</button>

                </form>
            
            </div>
            </div>
            </div>
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
                <div class="modal-title" id="exampleModalLabel"><h4 class="w3-center pb-1 ">Delete Image</h4></div>
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
                        document.getElementById("id2").value = k;
                    }
                </script>
                <form action="adminDeleteAddvertise" class="w-50 mx-auto" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" id="id2">
                    Confirm !!

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-danger btn-block my-4">Delete</button>

                </form>
            
            </div>
            </div>
            </div>
        </div>
        </div>

@include('script')