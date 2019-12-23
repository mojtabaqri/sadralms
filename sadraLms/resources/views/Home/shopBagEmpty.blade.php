@extends('layouts.index')
@section('index-title')
    سبد خرید خالی است
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
                <tbody>
                <tr class="text-center">
                    <td class="w-50">سبد خالی است</td>
                    <td class="w-50">
                      <a href="{{route('indexRoot')}}"><button class="btn btn-outline-danger ">">  بازگشت به صفحه محصولات</button></a>
                    </td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>
@endsection
