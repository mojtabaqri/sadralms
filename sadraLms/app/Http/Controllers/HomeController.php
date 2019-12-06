<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Array_;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        switch (auth()->user()->role) {
            case 1:
                return view('panel.student');
                break;
            case 2:
                return view('panel.master');
                break;
            case 3:
                return view('panel.admin');
                break;
            default:
                abort('403', 'Something went wrong!');
        }
    }
}







