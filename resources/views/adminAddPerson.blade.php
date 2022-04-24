@include('links')
@include('adminSideNav')

@if (session('personAddSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('personAddSuccess') }}
</div>
@endif

@if (session('personAddError'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
     {{ session('personAddError') }}
</div>
@endif

<div class="container mt-5 ">
<form action="addPersonData" method="post">
@csrf
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" class="form-control" name="firstName" />
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" name="lastName" />
        <label class="form-label" for="form3Example2">Last name</label>
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
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

  <!-- Register buttons -->
</form>
</div>
@include('script')
