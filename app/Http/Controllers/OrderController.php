<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
class OrderController extends Controller
{
    public function index(){    
    
        $response = Http::withBasicAuth('d1e596bee2f54be990e16e8dd6ddea3e', 'f34a64bccf8d4964aefa04fa586dce83')->get('http://ssapi.shipstation.com/orders/4556932');  
        $responseArr = Http::withBasicAuth('d1e596bee2f54be990e16e8dd6ddea3e', 'f34a64bccf8d4964aefa04fa586dce83')->get('http://ssapi.shipstation.com/orders?customerName=headhoncho@whitehouse.gov&page=2&pageSize=7');

        $responseArray = $response->json();
        $orderData =  $response->json();
        //$orderArr = $responseArr->json();
        json_decode($responseArr);
        error_log($responseArr);
           
       
               return view('orders/order', [
               'response' => $response,
               'responseArray' => $responseArray,
               'orderData' => $orderData,
               'responseArr' => $responseArr['orders'],
               //error_log($orderArr),
               //'order' => $order
               ]);
     //   return view('orders/order');
       }

       public function store(Request $request){

        $response = Http::withHeaders([
           'Authorization' => 'Basic ZDFlNTk2YmVlMmY1NGJlOTkwZTE2ZThkZDZkZGVhM2U6ZjM0YTY0YmNjZjhkNDk2NGFlZmEwNGZhNTg2ZGNlODM=',
           'Content-Type' => 'application/json'
       ])->post('http://ssapi.shipstation.com/orders/createorder',[
               "orderNumber"=>  "Test-10",
               "orderKey"=> "0f6bec18-3e89-4881-83aa-test14",
               "orderDate"=> "2015-06-29T08:46:27.0000000",
               "paymentDate"=> "2015-06-29T08:46:27.0000000",
               "shipByDate"=> "2015-07-05T00:00:00.0000000",
               "orderStatus"=> "awaiting_shipment",
               "customerId"=> 984941949,
               "customerUsername"=> "headhoncho@whitehouse.gov",
               "customerEmail"=> "headhoncho@whitehouse.gov",
               "billTo"=> [
                   "name"=> "The President",
               ],
               "shipTo"=> [
                 "street1"=> "1600 Pennsylvania Ave",
                 "street2"=> "Oval Office",
                 "postalCode"=> "20500"
               ]
           
           ]);
           $res = json_encode($response);
           
       return view('orders/order', [
           'response' => $response,
           error_log($response)
           
           ]);
   
   
      //     return redirect('/')->with('mssg','Thx for Order');
       }

       public function createOrder() {
           return view('orders/new-order-form');
       }

}