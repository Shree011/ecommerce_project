
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

<div class="w3-sidebar w3-bar-block w3-light-grey w3-card" style="width:20%;">
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <button class="w3-button w3-block w3-left-align" onclick="myAccFunc()">
  Delivery Person Details <i class="fa fa-caret-down"></i>
  </button>
  <div id="demoAcc" class="w3-hide w3-white w3-card">
    <a href="adminAddPerson" class="w3-bar-item w3-button">Add Person</a>
    <a href="adminEditDetails" class="w3-bar-item w3-button">Edit Details</a>
    <a href="#" class="w3-bar-item w3-button">History</a>
  </div>

  <a href="adminSellPersonsList" class="w3-bar-item w3-button">Sell Persons</a>
  <a href="adminSellRequests" class="w3-bar-item w3-button">Sell Requests</a>
  <a href="adminProductsHosted" class="w3-bar-item w3-button">Products on Site</a>
  <a href="adminLogout" class="w3-bar-item w3-button">Logout</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
</div>

<div class="w3-container" style="margin-left:20%;">

</div>

<script>
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
    x.previousElementSibling.className += " w3-green";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-green", "");
  }
}

</script>

</body>
</html>
