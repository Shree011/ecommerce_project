<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\deliveryperson;
use App\Models\deliverydetails;
class adminLoginCheck extends Controller
{

/* /////////////////   Admin working functions    /////////////////////////////////////////////// */
    function check(Request $req){
        $uname = $req->input("adminUserId");
        $pass = $req->input("adminPass");
        if($uname == "admin" && $pass == "admin"){
            return redirect('adminpage');
        }else{
            echo "enter correct user pass";
        }
    }
    function addDelPer(Request $req){
        $fname = (string)$req->input("firstName");
        $lname = (string)$req->input("lastName");
        $email = (string)$req->input("email");
        $phone = (string)$req->input("phone");
        $address = (string)$req->input("address");
        $pass = (string)$req->input("pass");

        $checkDup = DB::table('deliverypersons')->where('email', $email)->count();
        if($checkDup == 0){
            $data = DB::table('deliverypersons')
            ->insert(
                [
                    "name" => $fname . ' ' . $lname,
                    'email' => $email,
                    'phone' => $phone,
                    'address' => $address,
                    'pass' => $pass

                ]
            );
            return redirect('adminAddPerson')->with('personAddSuccess', 'Person Added Successfully');
        }else{
            return redirect('adminAddPerson')->with('personAddError', 'Please Enter Details Correct');
        }
    }

    function getDelDet(){
        $data = DB::table('deliverypersons')->get();
        return view('adminEditDetails', ['data'=>$data]);
    }

    function updatePerData(Request $req){
        $opr = DB::table('deliverypersons')
        ->where('id', $req->input('id'))
        ->update(
            [
                'name' => $req->input('firstName'),
                'email' => $req->input('email'),
                'phone' => $req->input('phone'),
                'address' => $req->input('address')
            ]
        );

        if($opr == 1){
            return redirect('sellerVerification')->with('personUpdateSuccess', 'Person Updated Successfully');
        }else{
            return redirect('sellerVerification')->with('personUpdateerror', 'Error, Please Fill details correct');
        }
    }

    function adminSellRequestsdata(){
        $data = DB::table('sellingproducts')->where('status', 'unverified')->get();
        return view('adminSellRequests', ['data'=>$data]);
    }

    function adminSellPersonsList(){
        $data = DB::table('sellerpersons')->get();
        return view('adminSellPersonsList', ['data'=>$data]);

    }

    function adminBuyersList(){
        $data = DB::table('buyerperson')->get();
        return view('adminBuyersList', ['data'=>$data]);
    }

    function adminProductsHosted(Request $req){
        $data = DB::table('systemdb')->get();
        return view('adminProductsHosted',['data'=>$data]);
    }


/* /////////////////////////    Seller working functions    ////////////////////////////////////////////////////////////////////////////// */
    function checkSellerDet(Request $req){
        //return $req->input();
        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $email = $req->input('email');
        $pass = $req->input('pass');
        
        $opr = DB::table('sellerpersons')
        ->where('email', $email)
        ->count();

        if($opr == 0){
            $opr1 = DB::table('sellerpersons')
            ->insert([
                'name' => $fname.' '.$lname,
                'email' => $email,
                'pass' => $pass
            ]);
            $req->session()->put("email", $email);
            return view('sellProductsSignup2');

        }else{
            return redirect('sellProductsSignup1');
        }
        
    }

    function checkCompany(Request $req){
        //return $req->input();
        $email = $req->input('id');
        $cname = $req->input('companyName');
        $sname = $req->input('storeName');
        $sellerAddress = $req->input('sellerAddress');
        $pincode = $req->input('pincode');
        $city = $req->input('city');
        $state = $req->input('state');
        $country = $req->input('country');
        $type = $req->input('type');
        
        $opr = DB::table('sellerpersons')
        ->where('storeName', '=', $sname)
        ->get();
        if($opr == "[]"){
            $opr1 = DB::table('sellerpersons')
            ->where('email', $email)
            ->update([
                'phone' => 'asda',
                'companyName' => $cname,
                'storeName' => $sname,
                'address' => $sellerAddress,
                'pincode' => $pincode,
                'city' => $city,
                'state' => $state,
                'country' => $country,
                'type' => $type 
            ]);
            $req->session()->pull("email");
            $req->session()->put('type', $type);
            return redirect('sellerPage');
        }else{
            //flashsess
            return view('sellProductsSignup2');
        } 

    }

    function addProduct(Request $req){

        $input = $req->input();
        if($req->hasFile('image')){
            $lastid = DB::table('sellingproducts')->max('id');
            if($lastid == 0){
                $lastid = 1;
            }else{
                $lastid = $lastid + 1;
            }
            $destinationPath = 'public/images/products';
            $image = $req->file('image');
            $imageName = $lastid.' '.$image->getClientOriginalName();
            $path = $req->file('image')->storeAs($destinationPath, $imageName);


            $input['image'] = $lastid.' '.$imageName;
            
            $sid = $req->session()->get('sellerId');
            DB::table('sellingproducts')
            ->insert([
                'sid' => $sid,
                'productName' => $input['pname'],
                'price' => $input['price'],
                'quantity' => $input['quantity'],
                'image' => $imageName,
                'category' => $input['category'],
                'description' => $input['description'],
                'status' => 'unverified'
            ]);

            return redirect('sellerPage')->with('status', 'Product Sent for Verification Successfully!');
        }
    }

    function sellerVerification(Request $req){
        $sid = $req->session()->get('sellerId');
        $data = DB::table('sellingproducts')
        ->where([
            ['status', '=', 'unverified'],
            ['sid', $sid]
        ])
        ->get();
        return view('sellerVerification', ['data'=>$data]);
    }

    function sellerVerificationApproved(Request $req){
        $sid = $req->session()->get('sellerId');
        $data = DB::table('sellingproducts')
        ->where([
            ['status', '=', 'accepted'],
            ['sid', $sid]
        ])
        ->get();
        return view('sellerVerificationApproved', ['data' => $data]);
    }

    function sellerVerificationDeclined(Request $req){
        $sid = $req->session()->get('sellerId');
        $data = DB::table('sellingproducts')
        ->where([
            ['status', '=', 'declined'],
            ['sid', $sid]
        ])
        ->get();
        return view('sellerVerificationDeclined', ['data' => $data]);
    }
    


    function checkSellerLogin(Request $req){
        $email = $req->input('email');
        $pass = $req->input('pass');

        $check = DB::table('sellerpersons')
        ->where([
            ['email','=', $email], 
            ['pass','=', $pass]
        ])
        ->count();
        
        if($check == 1){
            $sid = DB::table('sellerpersons')
            ->select('id')
            ->where([
                ['email','=', $email], 
                ['pass','=', $pass]
            ])
            ->value('sid');
             //echo $sid;
            $req->session()->put('sellerId', $sid);
            $req->session()->put('buyUserID', $email);
            $type = DB::table('sellerpersons')->where('id', $sid)->value('type');
            $req->session()->put('type', $type);
            return redirect('sellerPage');
        }else{

            return redirect('sellProuctsLogin')->with('sellerLoginStatus', 'Please Enter Correct Details!');
        }

    }
    
    function ProductVerifierLoginCheck(Request $req){
        $PVUserId = $req->input('PVUserId');
        $PVPass = $req->input('PVPass');

        if($PVUserId == 'pv' && $PVPass){
            return view('PVpage');
        }
    }

    function acceptProduct(Request $req){
        $input = $req->input('opr');
        $sellPrice = $req->input('sellPrice');
        $operation = DB::table('sellingproducts')
        ->where('id', $input)
        ->update(['status'=> 'accepted']);

        $operation2 = DB::table('sellingproducts')->where('id', $input)->get();
        foreach($operation2 as $i){
            $sid = $i->sid;
            $productName = $i->productName;
            $buyPrice = $i->price;
            $quantity = $i->quantity;
            $category = $i->category;
            $image = $i->image;
            $description = $i->description;
        }
        
        $insert = DB::table('systemdb')
          ->insert([
            'sid' =>  $sid,
            'productName' =>  $productName,
            'buyPrice' =>  $buyPrice,
            'sellPrice' =>  $sellPrice,
            'quantity' =>  $quantity,
            'category' =>  $category,
            'image' =>  $image,
            'description' =>  $description
        ]);

        return redirect('adminSellRequests');
    }

    function declineProduct(Request $req){
        $input = $req->input('opr');
        $reason = $req->input('reason');
        $operation = DB::table('sellingproducts')
        ->where('id', $input)
        ->update(
            ['status' => 'declined',
            'reason' => $reason]
        );
        echo $operation;
        return redirect('adminSellRequests');
    }



/* //////////////////     Home page functions       /////////////////////////////////////////////////////////// */  

    function homeCards(){
        $data = DB::table('systemdb')->get();
        

        $carouselData = DB::table('adminadvertisement')->get();
        $dataa['cards'] = $data;
        $dataa['carousel'] = $carouselData;
        return view('welcome', ['dataa'=>$dataa]);
    }


    function homeBuyView($id, Request $req){
        $data = DB::table('systemdb')->where('image', $id)->get();
        $req->session()->put('image', $id);
        $req->session()->put('data', $data);
        
        return redirect('homeBuyView');
    }

    function homeBuyProduct(Request $req){
        $buyUser = $req->session()->get('buyUserID');
        if($buyUser == null){
            return redirect('homeBuyUserLogin');
        }else{
            echo "buyId ".$buyUser;echo "<br>";
            echo "Quantity ".$req->buyQuantity;echo "<br>";
            echo "ProdID ".$req->id;
            echo "<br>";echo "<br>";
            $selQtym = DB::table('systemdb')->where('id', $req->id)->value('quantity');
            $newQty = $selQtym-$req->buyQuantity;
            if($newQty < 0){
                return redirect('homeBuyView')->with('buySuccess', 'Only '.$selQtym.' products available'); 
            }
            $updateQty = DB::table('systemdb')->where('id',$req->id)
            ->update([
                'quantity' => $newQty
            ]);

            $sellPrice = DB::table('systemdb')->where('id', $req->id)->value('sellPrice');
            $total = $sellPrice * $req->buyQuantity;
            echo $total;


            $insertBuyRecord = DB::table('buyingproducts')
            ->insert([
                'buyerID' => $buyUser,
                'productID' => $req->id,
                'quantityy' => $req->buyQuantity,
                'total' => $total,
                'buyingStatus' => 'inQueue'
            ]);
            $deliveryIDDest = deliveryperson::latest()->value('id');

            $deliveryIDInsert = deliverydetails::latest()->value('deliveryPersonID');
             if($deliveryIDInsert == 0){
                $deliveryIDInsert = 1;
            }else{
                $deliveryIDInsert = $deliveryIDInsert + 1; 
            }
            if($deliveryIDInsert > $deliveryIDDest){
                $deliveryIDInsert = 1;
            }
            
            $BuyedProductID = DB::table('buyingproducts')->max('id');
            $productName = DB::table('systemdb')->where('id',$req->id)->value('productName');
            $sellPrice = DB::table('systemdb')->where('id',$req->id)->value('sellPrice');
            $image = DB::table('systemdb')->where('id',$req->id)->value('image');
            

            $insertdeliveryRecord = DB::table('deliverydetails')
            ->insert(
                [
                'deliveryPersonID' => $deliveryIDInsert, 
                'BuyerID' => $buyUser, 
                'deliveryProductName' => $productName, 
                'deliveryProductID' => $BuyedProductID, 
                'deliveryPrice' => $sellPrice, 
                'deliveryQuantity'=> $req->buyQuantity, 
                'deliveryTotal' => $total,
                'deliveryImage' => $image,
                'deliveryStatus' => 'inQueue'
                ]
            );
                echo $insertdeliveryRecord;
            return redirect('homeBuyView')->with('buySuccess', 'Product Buyed Successfully'); 
        }
        
    }

    function addCarts(Request $req){
        $buyUser = $req->session()->get('buyUserID');
        if($buyUser == null){
            return redirect('homeBuyUserLogin');
        }else{
            $prodID = $req->input('id');
            $check = DB::table('carts')->where([['buyerID',$buyUser],['productID', $prodID]])->count();
            if($check == 0){
                $insert = DB::table('carts')->insert(
                    [
                        'buyerID' => $buyUser,
                        'productID' => $prodID
                    ]
                );
                return redirect('homeBuyView')->with('carts', 'Successfully added to Carts');
            }else{
                return redirect('homeBuyView')->with('carts', 'Product already added');
            }
        }
    }

    function carts(Request $req){
        $buyUser = $req->session()->get('buyUserID');
        if($buyUser == null){
            return redirect('homeBuyUserLogin');
        }else{
            $cartsData = 
            DB::table('carts')
            ->join('systemdb', 'carts.productID', '=', 'systemdb.id')
            ->where('carts.buyerID',$buyUser)
            ->get();
            return view('homeCarts',['data'=>$cartsData]);
        }
    }

    function removeCarts(Request $req){
        $id = $req->input('id');
        $delete = DB::table('carts')->where('cartsID', $id)->delete();
        return redirect('carts');
    }

    function buyUserSignup(Request $req){
        $check = DB::table('buyerperson')
        ->where(
            'email', $req->email
        )
        ->count();
        if($check != 0){
            return redirect('homeBuyUserSignup')->with('buyUserCheck', 'email already exists');
        }else{
            $opr = DB::table('buyerperson')
            ->insert(
                [
                    'name' => $req->fname. " ". $req->lname,
                    'email' => $req->email,
                    'pass' => $req->pass,
                    'phone' => $req->phone,
                    'address' => $req->address
                ]
            );
            $req->session()->put('buyUserID', $req->email);
            return redirect($req->url)->with('signupSuccess', 'Successfully Signed up');
        }
    }

    function buyUserLogin(Request $req){
        $check = DB::table('buyerperson')
        ->where(
            [
                [
                    'email', $req->email
                ],
                [
                    'pass', $req->pass
                ]
            ]
        )
        ->count();
        if($check == 1){
            $req->session()->put('buyUserID', $req->email);
            return redirect($req->url)->with('buyLogin', 'Login Successfull');
        }else{
            return redirect('homeBuyUserLogin')->with('buyLogin', 'Wrong email or password');
        }
    }

    function orders(Request $req){
        if(session('buyUserID')){
            $data = DB::table('buyingproducts')
            ->join(
                'systemdb', 'buyingproducts.productID', '=', 'systemdb.id'
            )
            ->where(
                
                    'buyingproducts.buyerID', session('buyUserID')
            )
            ->get();
            $req->session()->put('orders', $data);
            //return $data;
            return redirect('homeOrders');
        }else{
            return redirect('homeBuyUserLogin');
        }
    }

    function checkDeliveryLogin(Request $req){
        $check = DB::table('deliverypersons')
        ->where(
            [
                [
                    'email', $req->email
                ],
                [
                    'pass', $req->pass
                ]
            ]
        )
        ->count();
        if($check == 1){
            $delPerID = DB::table('deliverypersons')
            ->where(
                [
                    [
                        'email', $req->email
                    ],
                    [
                        'pass', $req->pass
                    ]
                ]
            )
            ->value('id');
            $req->session()->put('deliveryPersonID', $delPerID);
            $req->session()->put('deliveryPersonEmail', $req->email);
            return redirect('deliveryIndex')->with('deliveryLogin', 'Login Successfull');
        }else{
            return redirect('deliveryLogin')->with('deliveryLogin', 'Wrong email or password');
        }
    }

    function deliveryNewOrders(Request $req){
        $data = DB::table('deliverydetails')
        ->join('buyerperson', 'deliverydetails.BuyerID', '=' , 'buyerperson.email')
        ->where(
            [
                ['deliveryPersonID', session('deliveryPersonID')],
                ['deliveryStatus', 'inQueue']
            ]
        )
        ->get();
        $req->session()->put('newOrdersData', $data);
        return redirect('deliveryNewOrdersView');
    }

    function ordersStart(Request $req){
        $update = DB::table('deliverydetails')
        ->where('deliveryID', $req->orderID)
        ->update(
            [
                'deliveryStatus' => 'inProcess'
            ]
        );
        $delPrdID = DB::table('deliverydetails')->where('deliveryID', $req->orderID)->value('deliveryProductId');
        $update = DB::table('buyingproducts')
        ->where('id', $delPrdID)
        ->update(
            [
                'buyingStatus' => 'inProcess'
            ]
        );
        return redirect('deliveryNewOrders')->with('deliveryStart', 'You have Recived the delivery, Deliver it soon');
    }

    function deliveryInProcess(Request $req){
        $data = DB::table('deliverydetails')
        ->join('buyerperson', 'deliverydetails.BuyerID', '=' , 'buyerperson.email')
        ->where(
            [
                ['deliveryPersonID', session('deliveryPersonID')],
                ['deliveryStatus', 'inProcess']
            ]
        )
        ->get();
        $req->session()->put('InOrdersData', $data);
        return redirect('deliveryInOrdersView');
    }

    function ordersEnd(Request $req){
        $update = DB::table('deliverydetails')
        ->where('deliveryID', $req->orderID)
        ->update(
            [
                'deliveryStatus' => 'delivered'
            ]
        );
        $delPrdID = DB::table('deliverydetails')->where('deliveryID', $req->orderID)->value('deliveryProductId');
        $update = DB::table('buyingproducts')
        ->where('id', $delPrdID)
        ->update(
            [
                'buyingStatus' => 'delivered'
            ]
        );
        return redirect('deliveryInProcess')->with('deliveryEnd', 'You have successfulluy deliverd the Delivery'); 
    }

    function deliveryCompleted(Request $req){
        $data = DB::table('deliverydetails')
        ->join('buyerperson', 'deliverydetails.BuyerID', '=' , 'buyerperson.email')
        ->where(
            [
                ['deliveryPersonID', session('deliveryPersonID')],
                ['deliveryStatus', 'delivered']
            ]
        )
        ->get();
        $req->session()->put('CompletedOrdersData', $data);
        return redirect('deliveryCompletedView');
    }

    function homeSearch(Request $req){
        $search = $req->input('search');

        $data = DB::table('systemdb')
        ->orWhere('productName', 'like', "%{$search}%")
        ->orWhere('buyPrice', 'like', "%{$search}%")
        ->orWhere('sellPrice', 'like', "%{$search}%")
        ->orWhere('category', 'like', "%{$search}%")
        ->get();
        return view('homeSearchView', ['data'=>$data]);

    }

    function adminAddAddvertise(Request $req){
        //return $req->get('image');
        $input = $req->input();
        if($req->hasFile('image')){ 
            $lastid = DB::table('adminadvertisement')->max('id');
            if($lastid == 0){
                $lastid = 1;
            }else{
                $lastid = $lastid + 1;
            }
            $destinationPath = 'public/images/adminAdvertise';
            $image = $req->file('image');
            $imageName = $lastid.' '.$image->getClientOriginalName();
            $path = $req->file('image')->storeAs($destinationPath, $imageName);


            $input['image'] = $lastid.' '.$imageName;
            
            DB::table('adminadvertisement')
            ->insert([
                'addImage' => $imageName
            ]);

            return redirect('adminAdvertisement')->with('AddingAdvertise', 'Advertise uploaded Successfully!');
        }
    }

    function adminAdvertisement(){
        $data = DB::table('adminadvertisement')->get();
        return view('adminadvertisement', ['data'=>$data]);
    }

    function adminUpdateAddvertise(Request $req){
        $id = $req->input('id');echo $id;
        if($req->hasFile('image')){ 
            $lastid = DB::table('adminadvertisement')->where('id', $id)->value('addImage');
            unlink(public_path('storage/images/adminAdvertise/'.$lastid));
            $destinationPath = 'public/images/adminAdvertise';
            $image = $req->file('image');
            $imageName = $lastid.' '.$image->getClientOriginalName();
            $path = $req->file('image')->storeAs($destinationPath, $imageName);


            $input['image'] = $lastid.' '.$imageName;
            
            DB::table('adminadvertisement')
            ->where('id', $id)
            ->update([
                'addImage' => $imageName
            ]);

            return redirect('adminAdvertisement')->with('AddingAdvertise', 'Advertise uploaded Successfully!');
        }
    }
    
    function adminDeleteAddvertise(Request $req){
        $id = $req->input('id');
            $lastid = DB::table('adminadvertisement')->where('id', $id)->value('addImage');
            unlink(public_path('storage/images/adminAdvertise/'.$lastid));
            //$destinationPath = 'public/images/adminAdvertise';
            //$image = $req->file('image');
            //$imageName = $lastid.' '.$image->getClientOriginalName();
            //$path = $req->file('image')->storeAs($destinationPath, $imageName);


            //$input['image'] = $lastid.' '.$imageName;
            
            DB::table('adminadvertisement')
            ->where('id', $id)
            ->delete();

            return redirect('adminAdvertisement')->with('AddingAdvertise', 'Advertise Deleted Successfully!');
        

    }
}
