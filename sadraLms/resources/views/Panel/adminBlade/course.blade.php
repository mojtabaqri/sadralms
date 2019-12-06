@extends('layouts.app')
@section('title')
    مدیریت دوره ها
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h4 class="card-title">دوره ها</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="false">لیست دوره ها</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab-justified" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="true">افزودن دوره جدید</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="messages-tab-justified" data-toggle="tab" href="#messages-just" role="tab" aria-controls="messages-just" aria-selected="false">دوره های تایید نشده</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content pt-1 text-right">
                            <div class="tab-pane" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
                                لیست دوره ها
                            </div>
                            <div class="tab-pane active" id="profile-just" role="tabpanel" aria-labelledby="profile-tab-justified">
                            افزودن دوره جدید
                            </div>
                            <div class="tab-pane" id="messages-just" role="tabpanel" aria-labelledby="messages-tab-justified">
                               دوره های تایید نشده
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
