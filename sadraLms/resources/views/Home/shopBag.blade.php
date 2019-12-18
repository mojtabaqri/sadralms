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
        table{
            font-size: 12px!important;
        }
        h4{
            font-size: 12px!important;
        }

    </style>
    @endsection
@section('index-content')
    <div class="row">
        <div class="col-12 main">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:50%">نام محصول</th>
                    <th style="width:10%">قیمت پایه</th>
                    <th style="width:10%">تعداد سفارش</th>
                    <th style="width:22%" class="text-center">جمع کل</th>
                    <th style="width:10%">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @unless(empty($card))
                    @for($i=0 ;$i<count($card);$i++)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-10">
                                <h4 class="nomargin">{{$card[$i]['product_name']}}</h4>
                                <p></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"> {{$card[$i]['product_price']}} تومن</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="{{$card[$i]['quantity']}}">
                    </td>
                    <td data-th="Subtotal" class="text-center">{{$card[$i]['quantity']*$card[$i]['product_price']}}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o">حذف</i></button>
                    </td>
                </tr>
                @endfor
                    @endunless
                </tbody>
                <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>جمع کل : 100000</strong></td>
                </tr>
                <tr>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong> پرداخت </strong></td>
                    <td><a href="#" class="btn btn-success btn-block">تسویه <i class="fa fa-angle-right"></i></a></td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
