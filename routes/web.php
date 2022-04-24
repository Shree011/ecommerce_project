<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\adminLoginCheck;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [adminLoginCheck::class, "homeCards"]);

Route::get('admin', function () {
    return view('admin');
});
Route::post('adminLoginCheck', [adminLoginCheck::class, "check"]);
Route::view('adminpage', 'adminDashboard');
Route::view('adminDashboard', 'adminDashboard');
Route::view('delivery', 'delivery');
Route::get('adminSellRequests', [adminLoginCheck::class, "adminSellRequestsdata"]);
Route::get('adminBuyersList', [adminLoginCheck::class, "adminBuyersList"]);
Route::post('addPersonData', [adminLoginCheck::class, "addDelPer"]);
Route::view('adminAddPerson', 'adminAddPerson');
Route::get('adminEditDetails', [adminLoginCheck::class, "getDelDet"]);
Route::post('updatePersonData', [adminLoginCheck::class, "updatePerData"]);
Route::get('adminSellPersonsList', [adminLoginCheck::class, "adminSellPersonsList"]);
Route::get('adminProductsHosted', [adminLoginCheck::class, "adminProductsHosted"]);
Route::get('adminAdvertisement',[adminLoginCheck::class, "adminAdvertisement"]);
Route::post('adminAddAddvertise',[adminLoginCheck::class, "adminAddAddvertise"]);
Route::post('adminUpdateAddvertise',[adminLoginCheck::class, "adminUpdateAddvertise"]);
Route::post('adminDeleteAddvertise',[adminLoginCheck::class, "adminDeleteAddvertise"]);


Route::get('adminLogout', function(Request $req){
    return redirect('/');
});


Route::view('sellProuctsLogin', 'sellProuctsLogin');
Route::post('checkSeller', [adminLoginCheck::class, "checkSellerDet"]);
Route::view('sellProductsSignup1', 'sellProductsSignup1');
Route::view('sellProductsSignup2', 'sellProductsSignup2');
//Route::get('retailerBack', [adminLoginCheck::class, "retailerBack"]);
Route::post('checkCompany', [adminLoginCheck::class, "checkCompany"]);
Route::view('sellerPage', 'sellerPage');
Route::post('addProduct', [adminLoginCheck::class, "addProduct"]);
Route::get('sellerVerification', [adminLoginCheck::class, "sellerVerification"]);
Route::post('checkSellerLogin', [adminLoginCheck::class, "checkSellerLogin"]);
Route::get('sellerLogout', function(Request $req){
    $req->session()->flush('sellerId');
    return redirect('/');
});

Route::get('acceptProduct', [adminLoginCheck::class, "acceptProduct"]);
Route::get('declineProduct', [adminLoginCheck::class, "declineProduct"]);
Route::get('sellerVerificationApproved', [adminLoginCheck::class, "sellerVerificationApproved"]);
Route::get('sellerVerificationDeclined', [adminLoginCheck::class, "sellerVerificationDeclined"]);


Route::get('homeBuyView/{id}', [adminLoginCheck::class, "homeBuyView"]);
Route::view('homeBuyView', 'homeBuyView');
Route::post('homeBuyProduct', [adminLoginCheck::class, "homeBuyProduct"]);

Route::get('addCarts', [adminLoginCheck::class, "addCarts"]);
Route::get('carts', [adminLoginCheck::class, "carts"]);
Route::get('removeCarts', [adminLoginCheck::class, "removeCarts"]);

Route::view('homeBuyUserLogin', 'homeBuyUserLogin');
Route::view('homeBuyUserSignup', 'homeBuyUserSignup');
Route::post('buyUserSignup', [adminLoginCheck::class, "buyUserSignup"]);
Route::post('buyUserLogin', [adminLoginCheck::class, "buyUserLogin"]);

Route::get('homeSearch', [adminLoginCheck::class, "homeSearch"]);
Route::view('homeSearchView', 'homeSearchView');

Route::get('orders', [adminLoginCheck::class, "orders"]);

Route::get('buyerLogout', function(Request $req){
    $req->session()->flush('buyUserID');
    return redirect('/');
});

Route::view('homeOrders','homeOrders');

Route::view('deliveryLogin','homeDeliveryLogin');
Route::post('checkDeliveryLogin',[adminLoginCheck::class, "checkDeliveryLogin"]);
Route::view('deliveryIndex','deliveryIndex');

Route::get('deliveryNewOrders',[adminLoginCheck::class, "deliveryNewOrders"]);
Route::view('deliveryNewOrdersView','deliveryNewOrders');
Route::post('ordersStart',[adminLoginCheck::class, "ordersStart"]);
Route::get('deliveryInProcess',[adminLoginCheck::class, "deliveryInProcess"]);
Route::view('deliveryInOrdersView','deliveryInOrdersView');
Route::post('ordersEnd',[adminLoginCheck::class, "ordersEnd"]);
Route::get('deliveryCompleted',[adminLoginCheck::class, "deliveryCompleted"]);
Route::view('deliveryCompletedView','deliveryCompletedView');



Route::view('ProductVerifierLogin','ProductVerifierLogin');
Route::post('ProductVerifierLoginCheck',[adminLoginCheck::class, "ProductVerifierLoginCheck"]);
