@include('links')
@include('navbar')

@if (session('deliveryLogin'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
     {{ session('deliveryLogin') }}
</div>
@endif
<style>
@media (min-width: 992px) {
    .container {
        width: 50% !important;
    }
}
</style>

<div class="container mt-5 bg-light p-5">
<center><h2>DELIVERY LOGIN</h2></center>
<form method="POST" action='checkDeliveryLogin' class="mt-5">
@csrf
  <!-- Email input -->
  <div class="form-outline mb-4">
    <input type="email" id="form1Example1" class="form-control" name="email"/>
    <label class="form-label" for="form1Example1">Email address</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form1Example2" class="form-control"  name="pass"/>
    <label class="form-label" for="form1Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">
    <!-- <div class="col d-flex justify-content-center">
      <div class="form-check">
        <input
          class="form-check-input"
          type="checkbox"
          value=""
          id="form1Example3"
          checked
        />
        <label class="form-check-label" for="form1Example3"> Remember me </label>
      </div>
    </div> -->

    <div class="col">
      <!-- Simple link -->
      <!-- <a href="homeDeliverySignup">New User?</a> -->
    </div>
  </div>

  <!-- Submit button -->
  <center><button type="submit" class="btn btn-primary btn-block w-50">Sign in</button></center>
</form>
</div>

@include('script')