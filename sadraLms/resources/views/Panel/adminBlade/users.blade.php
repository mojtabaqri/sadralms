@extends('layouts.app')
@section('title')
    لیست کاربران
@stop

@section('coustom-style')


    <style>
        th:nth-child(1){
            width: 15%!important;
        }
        th:nth-child(2){
            width: 25%!important;
        }
        th:nth-child(3){
            width: 20%!important;
        }
        th:nth-child(4){
            width: 40%!important;
        }
        .dataTables_filter{
            margin-bottom: 1.5%;
        }
        table.dataTable thead th, table.dataTable thead td {
            border-bottom: none!important;
        }
        table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
             border-bottom-width: 1px;
        }
        table.dataTable.no-footer {
            border-bottom:none!important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
            border: none!important;
            background: #7367f0;
            color: white!important;
            border-radius: 60%;
        }
        #userTable_paginate{
            margin: 1em 25em!important;
        }
        .modal-header .close {
            margin: -1rem -1rem -1rem 0em!important;
        }
        .modal-title{
            margin: 0 auto!important;
        }
        .modal .modal-footer{
            margin: 1em auto;
        }
        .modalBtn{
            margin: 0 1em;
        }
        .form-group{
            text-align: right!important;
        }

    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-12 text-right" style="direction: ltr!important;">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> کاربران</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered data-table" id="userTable">
                                <div  class="row">
                                    <div class="col-6">
                                        <label for="customSelect">انتخاب نوع کاربر</label><select class="custom-select w-25 " id="customSelect" >
                                            <option selected="" value="4">نمایش همه    </option>
                                            <option value="3">مدیران</option>
                                            <option value="2">اساتید </option>
                                            <option value="1">دانشجویان </option>
                                        </select>
                                    </div>
                                </div>
                                <thead>
                                <tr>
                                    <th>نام </th>
                                    <th>نام کاربری  </th>
                                    <th>سمت </th>
                                    <th width="100px">عملیات</th>
                                </tr>

                                </thead>

                                <tbody>

                                </tbody>

                            </table>

                        </div>
                        </div>
                </div>
            </div>

        </div>
    </div>
    <div  class="modal fade "  id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="userModalHeader">مدیریت کاربر </h5>
                </div>

                <div class="modal-body">

                    <!-- Start User  Modal  -->
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card" style="margin-bottom:0!important;">
                                <header class="card-header">

                                    <h4 class="card-title mt-2" id="userTitle">نام کاربر : ممجتبی غریب رضا یزدی</h4>
                                </header>
                                <div class="card-body">
                                    <form>
                                        <div class="form-row">
                                            <div class="col form-group">
                                                <label>نام خانوادگی</label>
                                                <input type="text" class="form-control" placeholder="" id="editLname">
                                            </div> <!-- form-group end.// -->
                                            <div class="col form-group">
                                                <label>نام</label>
                                                <input type="text" class="form-control" placeholder=" " id="editName">
                                            </div> <!-- form-group end.// -->
                                        </div> <!-- form-row end.// -->
                                        <div class="form-group">
                                            <label>پست الکترونیک</label>
                                            <input type="email" class="form-control" placeholder="" id="editEmail">
                                            <small class="form-text text-muted">قبل از ثبت مطمئن شوید که این ایمیل توسط کاربر دیگری ثبت نشده باشد</small>
                                        </div> <!-- form-group end.// -->
                                        <!-- form-group end.// -->
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label>آدرس</label>
                                                <input type="text" class="form-control" id="editAddress">
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-md-6">
                                                <label>سطح دسترسی</label>
                                                <select id="editRole" class="form-control">



                                                    <option selected="">انتخاب کنید</option>


                                                    <option value="3">مدیر اصلی</option>
                                                    <option value="2">استاد </option>
                                                    <option value="1">دانشجو </option></select>
                                            </div> <!-- form-group end.// -->



                                            <div class="form-group col-md-6">
                                                <label>ایدی اینستاگرام</label>
                                                <input type="text" class="form-control" id="editInstaId">

                                            </div>


                                            <div class="form-group col-md-6">
                                                <label>ایدی تلگرام</label>
                                                <input type="text" class="form-control" id="editTeleId">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label>محل زندگی </label>
                                                <input type="text" class="form-control" id="editCity">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>آدرس وبسایت </label>
                                                <input type="text" class="form-control" id="editWeb">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label for="label-textarea"> متن درباره </label><textarea class="form-control" id="editBio" rows="3" placeholder="درباره من"></textarea>
                                            </div>


                                        </div> <!-- form-row.// -->
                                        <div class="form-group">
                                            <label>تغیر رمز عبور کاربر</label>
                                            <input class="form-control" type="password" id="editPass">
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group">
                                            <button type="submit" id="editBtn" class="btn btn-primary btn-block waves-effect waves-light">ثبت و ویرایش نهایی</button>
                                        </div> <!-- form-group// -->

                                    </form>
                                </div> <!-- card-body end .// -->

                            </div> <!-- card.// -->
                        </div> <!-- col.//-->

                    </div>
                    <!-- End User  Modal  -->


                </div>
            </div>
        </div>
    </div>
        @stop
@section('coustom-js')

            <script type="text/javascript">
        $(document).ready(function () {
            let editRecordId;
            let roleFilter=4;
            $("#customSelect").change(function () {
                roleFilter=$(this).val();
                $("#userTable").DataTable().destroy();
                fillDataTable(roleFilter);

            });
            let fillDataTable=(roleFilter=4)=>{
                let dataTable= $('#userTable').DataTable({
                    processing: true,
                    serverSide: true,
                    "language": {
                        "infoFiltered":   "(جستجو شده  از _MAX_  کاربر)",
                        "lengthMenu":     "نمایش _MENU_ کاربر",
                        "search": "جستجو",
                        "processing":"درحال پردازش",
                        "emptyTable":'کاربری یافت نشد',
                        "infoEmpty":"نمایش 0 کاربر از 0 کاربر ",
                        "loadingRecords":"درحال بارگزاری ",
                        "zeroRecords":"کاربری با این نام یافت نشد",
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
                        url:"{{route('user.index')}}",
                        data:{
                            filterRole:roleFilter
                        }
                    },
                    columns: [
                        {data: 'name', name: 'name'},
                        {data: 'email', name: 'email'},
                        {data: 'role', name: 'role'},
                        {data: 'action', name: 'action', orderable: true, searchable: true},
                    ]
                });
            };
             fillDataTable();

             //End fillDataTable

        // **************************************** Start Delete Action ---------------------------
            $('body').on('click', '.delete', function () {
                let recordId = $(this).attr("id");
                let cancle=confirm("آیا شما می خواهید این کاربر را حذف کنید؟");
                if(!cancle) return false;
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: "DELETE",
                    url: "/user"+'/'+recordId,
                    data: {
                        "id": recordId ,
                    },
                    success: function (data) {
                        $("#userTable").DataTable().draw();
                        alert('با موفقیت حذف شد!')
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
            // ****************************************** End Delete Action ---------------------------
            // ****************************************** Start Edit Action ---------------------------
            $('body').on('click', '.edit', function () {
                editRecordId = $(this).attr('id');
                $("#editBio").val();
                $("#editInstaId").val();
                $("#editCity").val();
                $("#editWeb").val();
                $("#editTeleId").val();
                $("#userModal").modal();
                $("#userModalHeader").text('ویرایش کاربر');
                 $.get("/user" +'/' + editRecordId +'/edit', function (data) {
                     $("#editAddress").val(data.user.address);
                     $("#editBio").val(data.userInfo.userBio);
                     $("#editEmail").val(data.user.email);
                     $("#editInstaId").val(data.userInfo.userInstaId);
                     $("#editLname").val(data.user.lname);
                     $("#editName").val(data.user.name);
                     $("#editCity").val(data.userInfo.userCity);
                     $("#editWeb").val(data.userInfo.userWeb);
                     $("#editTeleId").val(data.userInfo.userTeleId);
                     $("#userTitle").text(data.user.name+" "+data.user.lname);
                     $("#editRole option[value="+ data.user.role+"]").attr('selected','selected');
                     $("#editRole").val(data.user.role);
                 })
            });

            $("#editBtn").click(function (e) {
                e.preventDefault();
                console.log(editRecordId);
                let data={
                    'id':editRecordId,
                    'city':$("#editCity").val().trim(),
                    'web':$("#editWeb").val().trim(),
                    'address': $("#editAddress").val().trim(),
                    'bio':$("#editBio").val().trim(),
                    'email':$("#editEmail").val().trim(),
                    'instaId':$("#editInstaId").val().trim(),
                    'lname':$("#editLname").val().trim(),
                    'name':$("#editName").val().trim(),
                    'pass':$("#editPass").val().trim(),
                    'role':$("#editRole").val().trim(),
                    'teleId':$("#editTeleId").val().trim(),
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    data: data,
                    url: "{{ route('user.store') }}",
                    type: "POST",
                    dataType: 'json',
                    success: function (data) {
                        $("#userTable").DataTable().draw();
                        alert('با موفقیت تغیر کرد');
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

            })

            // ****************************************** End Edit Action ---------------------------

        });
    </script>

@stop
