<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class ShopBagController extends Controller
{
    public function index($id)
    {
        return view('Home.shopBag');
    }
    public function addToCard(Request $request)
    {
        $product_id = $request-> product_id;
        $cards = session()->get('cards');
        $cards = is_array($cards)? $cards:[];
        $ids = array_column($cards, 'product_id');
        if(! in_array($product_id, $ids))
            return session()->push('cards', [
                'product_id'=> $product_id,
                'quantity'=> 1
            ]);
        $index = array_search($product_id, $ids);
        $cards[$index]['quantity']++;
        session()->foregt('cards');
        session()->put('cards', $cards);
    }
    public function getCard()
    {
        return response()->json(Session::get('cards'));
    }
}
