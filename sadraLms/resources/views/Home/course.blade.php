@extends('layouts.index')

@section('index-title')
    @unless(empty($course))
        {{$course->name}}
    @endunless
    @endsection

@section('index-content')
    <div class="row">
            <div class="col-8 bg-secondary text-light text-right p-3">
                <h3>پیش نمایش دوره </h3>
                <video width="700" height="400" poster="@unless(empty($course)){{url('/')."/".$course->courseRoot."/preview.jpg"}}@endunless" controls>
                    <source src="@unless(empty($course)){{url('/')."/".$course->courseRoot."/preview.mp4"}}@endunless" type="video/mp4">
                </video>
                </div>
            <div class="col-4 bg-success text-light text-right p-3 ">

                <p class="text-light">

                    Teststststst
                </p>

                </div>
    </div>
    @endsection
