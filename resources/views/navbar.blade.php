<!-- Navbar -->
<nav class="navbar navbar-expand-sm sticky-top navbar-dark bg-dark " style="border-radius: 0;">
  <div class="container-fluid">
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <a class="navbar-brand mt-2 mt-lg-0" href="/">
        E-Commerce
      </a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="#">{{session('buyUserID')}}</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="#">{{session('type')}}</a>
        </li> -->
      </ul>
    </div>
 
    <div class="collapse navbar-collapse justify-content-center " id="navbarRightAlignExample">
      <ul class="navbar-nav mb-2 mb-lg-0" >
            <form method="get" action="homeSearch" >
            <div class="input-group" >
                <div class="form-outline">
                    <input type="search" id="form1" class="form-control bg-light" placeholder="Search" name="search"/>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            </form>
        
      </ul>
    </div>
   
    <div class="collapse navbar-collapse" id="navbarCenteredExample" >
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="orders">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="carts">Carts</a>
        </li>       
        <li class="nav-item">
            @if(session('buyUserID') == null)
                <a class="nav-link active" aria-current="page" href="homeBuyUserLogin">&nbsp;Login</a>
            @else
                <a class="nav-link active" aria-current="page" href="buyerLogout">&nbsp;Logout</a>
            @endif
        </li>
      </ul>
    </div>

  </div>
</nav>
<!-- Navbar -->


<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 2rem;">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <!-- Dropdown -->
      <li class="nav-item dropdown">
        <a
          class="nav-link"
          href="#"
          id="navbarDropdownMenuLink"
          role="button"
          data-mdb-toggle="dropdown"
          aria-expanded="false"
        >
        <i class="fas fa-bars"></i>
          All
        </a>
        <ul class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink" 
            style="margin-top: -0.33rem; margin-left: -1rem; width:20rem; height: 46rem">
<!--           <li>
            <a class="dropdown-item" href="#">Action</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Another action</a>
          </li> -->
          <li>
            <a class="dropdown-item" href="admin">Admin Login</a>
          </li>
          <li>
            <a class="dropdown-item" href="sellProuctsLogin">Sell your products</a>
          </li>  
          <li>
            <a class="dropdown-item" href="ProductVerifierLogin">Product Verifier</a>
          </li>  
          <li>
            <a class="dropdown-item" href="deliveryLogin">Delivery Login</a>
          </li>         
        </ul>
      </li>

            <!-- Left links -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Mobiles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">MensWear</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Footwear</a>
        </li>
      </ul>
      <!-- Left links -->
    </ul>
  </div>
</nav>
