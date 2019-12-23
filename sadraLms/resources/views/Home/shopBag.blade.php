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
                    <th style="width:10%"> ردیف</th>
                    <th style="width:40%">نام محصول</th>
                    <th style="width:10%">قیمت پایه</th>
                    <th style="width:10%">تعداد سفارش</th>
                    <th style="width:10%" class="text-center">جمع کل</th>
                    <th style="width:20%">عملیات</th>
                </tr>
                </thead>
                <tbody>
                @unless(empty($card))
                    @php $payment="0";@endphp
                    @for($i=0 ;$i<count($card);$i++)
                <tr class="{{$i}}" id="{{$card[$i]['product_id']}}">
                    <td> {{$i+1}}</td>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-10">
                                <h4 class="nomargin">{{$card[$i]['product_name']}}</h4>
                                <p></p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price"><span class="basePrice">{{$card[$i]['product_price']}}</span>  تومن</td>
                    <td data-th="Quantity">
                        <label for="qty"></label><input id="qty" name="qty" type="number" class="form-control text-center" value="{{$card[$i]['quantity']}}" min="0">
                    </td>
                    <td data-th="Subtotal" class="text-center"><span id="subTotal">{{$card[$i]['quantity']*$card[$i]['product_price']}}</span></td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm remove"><i class="fa fa-trash-o">حذف</i></button>
                    </td>
                </tr>
                @php
                    $payment=$payment+($card[$i]['product_price']*$card[$i]['quantity']);
                @endphp
                @endfor
                    @endunless
                </tbody>
                <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>جمع کل : <span class="payment">{{$payment}}</span></strong></td>
                </tr>
                <tr>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong> پرداخت</strong></td>
                    <td><a href="/confirmBuy" class="btn btn-success btn-block">تسویه <i class="fa fa-angle-right"></i></a></td>
                </tr>
                </tfoot>
            </table>

        </div>
    </div>
@endsection
@section('js')

    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("change", "#qty", function (e) {
                let qty=(this.value);
                let ParentId=this.parentElement.parentElement.className;
                let basePrice=$("."+ParentId).find(".basePrice").html();
                $("."+ParentId).find("#subTotal").text(basePrice*qty);
            });
            $(document).on("click", ".remove", function (e) {
                let ParentId=this.parentElement.parentElement.className;
                let Product_id=$("."+ParentId).attr('id').trim();
                $.ajax({
                    type: 'post',
                    url: '{{route('deleteCard')}}',
                    data: {
                        'id':Product_id,
                        'userId':'{{auth()->user()->id}}',
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res=="ok")
                        {
                            $("."+ParentId).slideUp();
                        }
                        else{
                            alert('Error')
                        }

                    }
                });
             });

        });
    </script>
    @endsection
