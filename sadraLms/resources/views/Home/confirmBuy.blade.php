@extends('layouts.index')
@section('index-title')
    پرداخت
@endsection
@section('css')
    <style type="text/css">

    </style>
    @endsection
@section('index-content')
    <div class="row">
        <div class="col-12 main bg-light text-center p-5">
            <h4 >تایید پرداخت </h4>
            <span class="text-primary">مبلغ قابل پرداخت :<a href="#">{{$paymentVal}}</a> </span>
            <hr>
            <a href="/payment"><button class="btn btn-outline-success buy"> پرداخت</button></a>
        </div>
    </div>
@endsection
@section('js')

    @endsection
