<style>
@media (min-width: 992px) {
    .container {
        width: 50% !important;
    }
}
</style>

@include('links')
<div class="container mt-5 bg-light p-5">
<center><h2>Verifier LOGIN</h2></center>
<form class="border-top mt-3" action="ProductVerifierLoginCheck" method="post">
    @csrf
  <!-- Email input -->
  <div class="form-outline mb-4 mt-3">
    <input type="text" id="form1Example1" class="form-control" name="PVUserId" />
    <label class="form-label" for="form1Example1">User ID</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" id="form1Example2" class="form-control" name="PVPass" />
    <label class="form-label" for="form1Example2">Password</label>
  </div>

  <!-- 2 column grid layout for inline styling -->
  <div class="row mb-4">



</div>

  <!-- Submit button -->
  <center><button type="submit" class="btn btn-primary btn-block w-50">Sign in</button></center>
</form>

<div>

@include('script')