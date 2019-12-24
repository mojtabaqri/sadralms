<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Zarinpal\Zarinpal;
class PaymentController extends Controller
{

    public function index()
    {
        $paymentVal="0";
        $cards = session()->get('cards');
        if(empty($cards)){
            return view('Home.shopBagEmpty');
        }
        foreach ($cards as $item)
        {
            $paymentVal= $paymentVal + ($item['product_price']*$item['quantity']);
        }
        return view('Home.confirmBuy',compact("cards",'paymentVal'));
    }

    public function pay(Request $request)
    {

        $zarinpal = new Zarinpal('aae0a368-021a-11e6-aldb-005056a205be');
        $zarinpal->enableSandbox(); // active sandbox mod for test env
        $results = $zarinpal->request(
            route('paymentCallBack'),          //required
            1000,                                  //required
            'testing',                             //required
            'me@example.com',                      //optional
            '09000000000',                         //optional
            [                          //optional
                "Wages" => [
                    "zp.1.1"=> [
                "Amount"=> 120,
                "Description"=> "part 1"
            ],
            "zp.2.5"=> [
        "Amount"=> 60,
                "Description"=> "part 2"
            ]
        ]
    ]
);
echo json_encode($results);
if (isset($results['Authority'])) {
    file_put_contents('Authority', $results['Authority']);
    $zarinpal->redirect();
}


    }
    public function paymentCallBack()
    {
        return "call Back method";
    }

}
