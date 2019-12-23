<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
