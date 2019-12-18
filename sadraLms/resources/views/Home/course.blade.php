@extends('layouts.index')

@section('index-title')
    @unless(empty($course))
        {{$course->name}}
    @endunless
    @endsection

@section('index-content')
    <div class="row">
            <div class="col-8 bg-light text-light text-right p-3">
                <h3 class="text-primary">پیش نمایش      @unless(empty($course))
                        {{$course->name}}
                    @endunless </h3>
                <video width="700" height="400" poster="@unless(empty($course)){{url('/')."/".$course->courseRoot."/preview.jpg"}}@endunless" controls>
                    <source src="@unless(empty($course)){{url('/')."/".$course->courseRoot."/preview.mp4"}}@endunless" type="video/mp4">
                </video>
                </div>
            <div class="col-4 bg-light text-light text-right p-3 text-center ">

                <p class="text-dark">
                    @unless(empty($course))
                        {{$course->description}}
                    @endunless
                </p>
                <button class="btn btn-outline-danger addToCardBtn mt-5"> افزودن به سبد خرید</button>
                </div>
    </div>
    @endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(".addToCardBtn").click(function () {
                $.ajax({
                    type: 'post',
                    url: '{{route('addCard',$id)}}',
                    data: {
                        'product_id':"{{$id}}",
                        'userId':"{{auth()->user()->id}}",
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                        if(res=="ok") alert('با سبد خرید شما افزوده شد ');
                    }
                });
            });

        })

    </script>

    @endsection
