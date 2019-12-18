<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Session\TokenMismatchException;
use Session;
class ShopBagController extends Controller
{
    public function index($id)
    {
        return view('Home.shopBag');
    }
    public function addToCard(Request $request)
    {
        try {
            $product_id = $request-> product_id;
            $cards = session()->get('cards');
            $cards = is_array($cards)? $cards:[];
            $ids = array_column($cards, 'product_id');
            if(! in_array($product_id, $ids))
                return session()->push('cards', [
                    'product_id'=> $product_id,
                    'quantity'=> 1,
                    'userId'=> $request->userId
                ]);
            $index = array_search($product_id, $ids);
            $cards[$index]['quantity']++;
            $request->session()->forget('cards');
            session()->put('cards', $cards);
            return response()->json('ok');
        }
        catch (TokenMismatchException $e)
        {
            return $e->getMessage();
        }


    }
    public function getCard()
    {
        $data=Session::get('cards');
        $card=[];
        foreach ($data as $item)
        {
            $item['product_name'] = Course::find($item['product_id'])->name;
            $item['product_root'] = Course::find($item['product_id'])->courseRoot;
            $item['product_description'] = Course::find($item['product_id'])->description;
            $item['product_price'] = Course::find($item['product_id'])->price;
            $card[]=$item;
        }
        Session::forget('cards');
        Session::put('cards',$card);
        return view('Home.shopBag',compact("card"));
    }
}
