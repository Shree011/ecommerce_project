@include('links')
@include('navbar')
@if (session('buyLogin'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
     {{ session('buyLogin') }}
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
<center><h2>CUSTOMER LOGIN</h2></center>
<form method="POST" action='buyUserLogin' class="mt-5">
@csrf
  <input value="{{url()->previous()}}" type="hidden" name="url">
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
  
    <center><div class="">
      <!-- Simple link -->
      <a href="homeBuyUserSignup">New User?</a>
    </div>
  

  <!-- Submit button -->
  <center>
  <button type="submit" class="btn btn-primary btn-block w-50 mt-3">Sign in</button></center>
</form>
</div>
@include('script')