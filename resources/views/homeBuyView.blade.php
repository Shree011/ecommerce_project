@include('links')
@include('navbar')

@if (session('buySuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('buySuccess') }}
</div>
@endif

@if (session('buyLogin'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('buyLogin') }}
</div>
@endif

@if (session('signupSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('signupSuccess') }}
</div>
@endif
@if (session('carts'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('carts') }}
</div>
@endif

<?php
    $data = session('data');
?>
@foreach ( $data as $alldata )
<?php
    $prdName = $alldata->productName;
    $prprice = $alldata->sellPrice;
?>
<div class="container mt-4">
  <div class="row">
    <div class="col-md-4">
    <img width="100%" src="storage/images/products/{{ session('image') }}" />
    </div>
    <div class="offset-1 col-md-7">
    
        <div class="row">
            <h4>{{$alldata->productName}}</h4>
        </div>
        <div class="row mt-2">
            <p>₹<span id="sp">{{$alldata->sellPrice}}</span></p>
        </div>
        <div class="row mt-3">
            {{$alldata->description}}
        </div>

        <div class="row mt-3">
            @if($alldata->quantity > 10)
                <span class="text-success">IN STOCK</span>
            @else
                <span class="text-danger">{{$alldata->quantity}} left</span>
            @endif
        </div>
        
            
        <input type="hidden" value="{{$alldata->id}}" class="form-control" name="id" id="id"/>
        <div class="col-2 mb-3">
            <div class="form-outline">
                <input type="number" class="form-control" name="buyQuantity" min=0 id="qty" />
                <label class="form-label" for="qty">Quantity</label>
            </div>
           <p id="viewPrice"></p> 
        </div>
        <div class="row">
            <div class="col-2 form-outline">
                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal" onclick="abc()" name="buy">Buy</button>
            </div>
            <div class="col-2">
                <form action="addCarts" method="get">
                    <input type="hidden" value="{{$alldata->id}}" class="form-control" name="id" id="id"/>
                    <button type="submit" class="btn btn-primary">Carts</button>
                </form>
            </div>
        </div>
        
        
        
    </div>

  </div>
</div>
@endforeach

            <!-- Modal -->
        <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-md">
            <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title" id="exampleModalLabel"><h4 class="w3-center pb-1 ">Receipt</h4></div>
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
                function abc(){
                    var id = document.getElementById("id").value;
                    var qty = document.getElementById("qty").value;
                    var sp = document.getElementById("sp").innerHTML;

                    document.getElementById("id2").value = id;
                    document.getElementById("qty2").value = qty;
                    document.getElementById("showprice").innerHTML = qty;
                    document.getElementById("total").innerHTML = sp * qty;
                    document.getElementById("total2").innerHTML = sp * qty;
                }
            </script>
                <form action="homeBuyProduct" method="POST">
                    @csrf
                    <input type="hidden" id="id2" name="id" />
                    <input type="hidden" id="qty2" name="buyQuantity" />
                    <table class="table">
                        
                        <tbody>
                            <tr>
                            <th scope="row">{{$prdName}}</th>
                            <td>{{$prprice}}</td>
                            </tr>
                            <tr>
                            <th scope="row">Quantity</th>
                            <td id="showprice"></td>
                            </tr>
                            <tr class="table-active">
                            <th scope="row">Total</th>
                            <td id="total"></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="offset-4 col-4">You need to pay <span class="text-success">₹<span id="total2"></span></span></div>
                    <button type="submit" class="offset-9 col-3 btn btn-success" >Confirm</button>
                </form>
            </div>
            </div>
<!--             <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
                    Close
                </button>
            </div> -->
            </div>
        </div>
        </div>

@include('script')