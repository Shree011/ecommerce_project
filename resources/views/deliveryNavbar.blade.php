<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2">
        E-Commerce
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="deliveryNewOrders">New Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="deliveryInProcess">Executing Orders</a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="deliveryCompleted">Completed Orders</a>
        </li>        
<!--         <li class="nav-item">
          <a class="nav-link" href="sellerVerification">Verification</a>
        </li> -->
              <!-- Dropdown -->
<!--         <li class="nav-item dropdown">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
          >
            Delivery
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li>
              <a class="dropdown-item" href="sellerVerification">New</a>
            </li>
            <li>  
              <a class="dropdown-item" href="sellerVerificationApproved">In-process</a>
            </li>
            <li>
              <a class="dropdown-item" href="sellerVerificationDeclined">Completed</a>
            </li>
          </ul>
        </li> -->

      </ul>
      <!-- Left links -->

      <div class="d-flex align-items-center">
          <a href="sellerLogout">
        <button type="submit" class="btn btn-primary btn-theme me-3">
          Logout
        </button>
          </a>
        
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->