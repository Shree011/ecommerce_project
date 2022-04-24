@include('links')
@include('sellerNav')

@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('status') }}
</div>
@endif

<div class="container mt-5">
<form class="m-5" action="addProduct" method="POST" enctype="multipart/form-data">
    @csrf
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col-6">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" name="pname" />
        <label class="form-label" for="form6Example1">Product Name</label>
      </div>
    </div>
    <div class="col-3">
      <div class="form-outline">
        <input type="number" id="form6Example2" class="form-control" name="price" />
        <label class="form-label" for="form6Example2">Price</label>
      </div>
    </div>
    <div class="col-3">
      <div class="form-outline">
        <input type="number" id="form6Example10" class="form-control" name="quantity" />
        <label class="form-label" for="form6Example10">Quantity</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col-5">
        <select class="form-select" aria-label="Default select example" name="category">
            <option selected>Category</option>
            <option value="Mobiles">Mobiles</option>
            <option value="TV">TV </option>         
            <option value="Computers">Computers</option>
            <option value="Appliances">Appliances</option>
            <option value="Electronics">Electronics</option>
            <option value="1MensClothes">Mens Clothes</option>
            <option value="WomensClothes">Womens Clothes</option>
            <option value="Home">Home</option>
            <option value="Grocery">Grocery</option>
            <option value="Beauty">Beauty</option>
            <option value="sports">sports</option>
            <option value="car">car</option>
            <option value="Bikes">Bikes</option>
            <option value="Gaming">Gaming</option>
            <option value="sports">sports</option>
            <option value="Ebooks">Ebooks</option>
        </select>
    </div>
    <div class="offset-1 col-1">
        <label class="form-label" for="customFile">Image</label>
    </div>
    <div class="col-5">
        <input type="file" class="form-control" id="customFile" name="image" />
    </div>
  </div>

  <!-- Text input -->
  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="form6Example7" rows="4" name="description"></textarea>
    <label class="form-label" for="form6Example7">Description</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input
      class="form-check-input me-2"
      type="checkbox"
      value=""
      id="form6Example8"
      checked
    />
    <label class="form-check-label" for="form6Example8"> Create an account? </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
</form>
</div>




@include('script')