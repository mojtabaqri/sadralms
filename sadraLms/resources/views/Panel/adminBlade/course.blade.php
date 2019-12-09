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
                                <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#home-just" role="tab" aria-controls="home-just" aria-selected="false">لیست دوره ها</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " id="profile-tab-justified" data-toggle="tab" href="#profile-just" role="tab" aria-controls="profile-just" aria-selected="true">افزودن دوره جدید</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="messages-tab-justified" data-toggle="tab" href="#messages-just" role="tab" aria-controls="messages-just" aria-selected="false">دوره های تایید نشده</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content pt-1 text-right">
                            <div class="tab-pane active" id="home-just" role="tabpanel" aria-labelledby="home-tab-justified">
                                <table class="table table-bordered data-table" id="userTable">
                                    <thead>
                                    <tr>
                                        <th width="100px">نام </th>
                                        <th> مدرس   </th>
                                        <th > تعداد خرید </th>
                                        <th > دسته بندی  </th>
                                        <th width="150px">عملیات</th>

                                    </tr>

                                    </thead>

                                    <tbody>

                                    </tbody>

                                </table>                            </div>
                            <div class="tab-pane " id="profile-just" role="tabpanel" aria-labelledby="profile-tab-justified">
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
@section('coustom-js')
    <script type="text/javascript">
        $(document).ready(function () {
            let fillDataTable=(roleFilter=4)=>{
                let dataTable= $('#userTable').DataTable({
                    processing: true,
                    serverSide: true,
                    "language": {
                        "infoFiltered":   "(جستجو شده  از _MAX_  دوره)",
                        "lengthMenu":     "نمایش _MENU_ دوره",
                        "search": "جستجو",
                        "processing":"درحال پردازش",
                        "emptyTable":'دورهی یافت نشد',
                        "infoEmpty":"نمایش 0 دوره از 0 دوره ",
                        "loadingRecords":"درحال بارگزاری ",
                        "zeroRecords":"دوره های  با این نام یافت نشد",
                        "info": "نمایش صفحات _PAGE_ از _PAGES_",
                        "paginate": {
                            "first":      "اولین",
                            "last":       "آخرین",
                            "next":       "بعدی",
                            "previous":   "قبلی"
                        },
                    },
                    lengthMenu: [
                        [ 5, 10, 20, -1 ],
                        [ '5 ', '10 ', '20 ', ' نمایش همه' ]
                    ],

                    ajax:{
                        url:"{{route('course.index')}}",
                    },
                    columns: [
                        {data: 'name', name: 'name'},
                        {data: 'master', name: 'master'},
                        {data: 'buyQtt', name: 'buyQtt'},
                        {data: 'cat', name: 'cat'},
                        {data: 'action', name: 'action', orderable: true, searchable: true},
                    ]
                });
            };
            fillDataTable();

        });


    </script>
    @endsection
