@include('links')

<div class="w-50 mt-5 mx-auto border">
<form class="container-fluid p-3" method="post" action="checkCompany">
    @csrf
    <input type="hidden" name="id" value="{{session('email')}}"/>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example1" class="form-control" name="companyName"/>
        <label class="form-label" for="form3Example1">Company/Bussiness Name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example2" class="form-control" name="storeName"/>
        <label class="form-label" for="form3Example2">Store Name</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-8">
      <div class="form-outline">
        <input type="text" id="form3Example3" class="form-control" name="sellerAddress"/>
        <label class="form-label" for="form3Example3">Address</label>
      </div>
    </div>
    <div class="col-4">
      <div class="form-outline">
        <input type="text" id="form3Example4" class="form-control" name="pincode"/>
        <label class="form-label" for="form3Example4">Pincode</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example5" class="form-control" name="city"/>
        <label class="form-label" for="form3Example5">City</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example5" class="form-control" name="state"/>
        <label class="form-label" for="form3Example5">State</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form3Example5" class="form-control" name="country"/>
        <label class="form-label" for="form3Example5">Country</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
    <select class="form-select" aria-label="Default select example" name="type" required>
      <option selected>Select Type</option>
      <option value="Bussiness">Bussiness Account</option>
      <option value="Retailer">Retailer Account</option>
    </select>
    </div>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>or sign up with:</p>
    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-facebook-f"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-google"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-twitter"></i>
    </button>

    <button type="button" class="btn btn-primary btn-floating mx-1">
      <i class="fab fa-github"></i>
    </button>
  </div>
</form>
</div> 




@include('script')