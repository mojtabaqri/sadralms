@extends('layouts.index')
@section('index-title')
 سبد خرید
@endsection
@section('css')
    <style type="text/css">
        ul>li{
            padding: 0.3rem;
            margin: 0.3rem;
            color: #ff4933;
        }

    </style>
    @endsection
@section('index-content')
    <div class="row">
        <div class="col-12 main">
            <div class="offset-2"></div>
            <div class="col-8">
                <ul class="list-unstyled d-inline-flex p-3 bg-light text-light">
                    <li>نام محصول  : <a  href="">CONE</a>  </li>
                    <li>تعداد سفارش   : <a href="">CONE</a>  </li>
                    <li>  <a href="#">حذف</a>  </li>
                </ul>
            </div>
            <div class="offset-2"></div>
        </div>
    </div>
@endsection
