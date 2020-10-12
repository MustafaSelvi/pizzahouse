<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use Illuminate\Support\Facades\Http;

class PizzaController extends Controller
{
    public function index(){

     //$pizzas = Pizza::where('type', 'hawaian')->get();
     $pizzas = Pizza::all();

     $response = Http::withBasicAuth('d1e596bee2f54be990e16e8dd6ddea3e', 'f34a64bccf8d4964aefa04fa586dce83')->get('http://ssapi.shipstation.com/orders/3109033');  
     
     $responseArray = $response->json();

            return view('pizzas.index', [
            'response' => $response,
            'responseArray' => $responseArray,
            'pizzas' => $pizzas
            ]);

       
    }

    public function show($id){
        $pizza = Pizza::findOrFail($id);

        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create(){
        return view('pizzas.create');
    }

    public function store(Request $request){

     $response = Http::withHeaders([
        'Authorization' => 'Basic ZDFlNTk2YmVlMmY1NGJlOTkwZTE2ZThkZDZkZGVhM2U6ZjM0YTY0YmNjZjhkNDk2NGFlZmEwNGZhNTg2ZGNlODM=',
        'Content-Type' => 'application/json'
    ])->post('http://ssapi.shipstation.com/orders/createorder',[
            "orderNumber"=>  $request->ordernumber,
            "orderKey"=> "0f6bec18-3e89-4881-83aa-test14",
            "orderDate"=> "2015-06-29T08:46:27.0000000",
            "paymentDate"=> "2015-06-29T08:46:27.0000000",
            "shipByDate"=> "2015-07-05T00:00:00.0000000",
            "orderStatus"=> $request->orderStatus,
            "customerId"=> 984941949,
            "customerUsername"=> "headhoncho@whitehouse.gov",
            "customerEmail"=> $request->customerEmail,
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
        error_log($response);
    return view('pizzas.create', [
        'response' => $response,
        'ordernumber' => $request->ordernumber,
        'customerEmail' => $request->customerEmail
        
        ]);


   //     return redirect('/')->with('mssg','Thx for Order');
    }

    public function destroy($id){
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');

    }
}
