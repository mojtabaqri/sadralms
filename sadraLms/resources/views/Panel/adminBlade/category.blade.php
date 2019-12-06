@extends('layouts.app')
@section('title')
    مدیریت دسته بندی ها
@stop

@section('coustom-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
    #userTable{
        width: auto!important;
        margin-right: 5px!important;
        margin-left: 5px!important;
    }
</style>
@stop

@section('content')
    <div class="row">
        <div class="col-12 text-right" style="direction: ltr!important;">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> دسته بندی ها </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-8 ">
                                <div class="">
                                    <table class="table table-bordered data-table" id="userTable">
                                        <div  class="row">
                                            <div class="col-12 mb-1">
                                                <label for="customSelect">انتخاب نوع دسته بندی </label><select class="custom-select w-25 " id="customSelect" >
                                                    <option value="0">مادر </option>
                                                    <option value="1">زیر دسته  </option>
                                                </select>
                                            </div >
                                        </div>
                                        <thead>
                                        <tr>
                                            <th width="150px">نام </th>
                                            <th>نوع   </th>
                                            <th >تعداد زیر دسته   </th>
                                            <th width="100px">نام مادر  </th>
                                            <th width="150px">عملیات</th>

                                        </tr>

                                        </thead>

                                        <tbody>

                                        </tbody>

                                    </table>
                                </div>


                            </div>

{{--                            Add CateGory--}}
                            <div class="col-4 addCategory border border-right-accent-1 p-2">
                                  <h4 class="card-title">افزودن دسته بندی جدید</h4>
                                <fieldset class="form-label-group form-group position-relative input-divider-right">
                                    <input type="text" class="form-control" id="catName" placeholder="نام دسته بندی">
                                    <div class="form-control-position">
                                        <i class="feather icon-file"></i>
                                    </div>
                                    <label for="catName"> نام را وارد کنید  </label>
                                </fieldset>

                                <fieldset>
                                    <div class="custom-control custom-switch custom-control-inline">
                                        <input type="checkbox" class="custom-control-input" id="catType">
                                        <label class="custom-control-label" for="catType">
                                        </label>
                                        <span class="switch-label">این یک زیر دسته بندی است</span>
                                    </div>

                                </fieldset>

                                <fieldset id="showParentCombo" style="display: none">
                                    <label for="parentCombo">نام دسته بندی مادر</label><select id="parentCombo" class="parentCombo" name="categories">
                                        @if (empty($categories))
                                            <option value="0"> دسته بندی موجود نیست </option>
                                            @else
                                            @foreach($categories as $item)
                                                <option value="{{$item->id}}">    {{$item->name}} </option>
                                            @endforeach
                                        @endif
                                    </select>

                                </fieldset>
                                <fieldset class="form-group">
                                    <textarea class="form-control" id="catDescription" rows="3" placeholder="شرح"></textarea>
                                </fieldset>

                                <button id="createCatBtn" class="btn btn-primary waves-effect waves-light" type="submit">ثبت</button>

                            </div>
{{--                            Add CateGory--}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@stop

@section('coustom-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script type="text/javascript">
    let catType=0; //if cat type =0 means default cat type is category
    $(document).ready(function () {
        let editRecordId,filterCat;
        let updateCats=()=>{
          $.get("{{route('catApi')}}",function (data) {
            $("#parentCombo").html(data);
          })
        };
        $("#customSelect").change(function () {
             filterCat=$(this).val();
            $("#userTable").DataTable().destroy();
            fillDataTable(filterCat);
        });
        //error handler
        let errorHandler=(response)=>{
              if(response.description){
                  alert("  شرح دسته بندی: "+response.description);
                  return false;
              }
            else if(response.name){
                  alert("  نام دسته بندی: "+response.name);
                  return false;
              }
            else{
                return response;
              }
        };
        //error handler
        $('.parentCombo').select2();
        //let Ajax
        let ajaxSendRequest=(data,route)=>{
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                data: data,
                url: route,
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    errorHandler(data);


                },
                error: function (data) {
                    console.log('Error:', data);
                    return false;
                }
            });

        };
        //show combo For choose Category Parent
        let showParent=()=>{
            if(catType>0) $("#showParentCombo").slideDown();
            else  $("#showParentCombo").slideUp();

        };
        //show combo For choose Category Parent
        //Category Check
        $("#catType").change(function () {
            if(this.checked) catType=1;
            else catType=0;
            showParent();
            //Category Check
        });
        //Submit Btn
        $("#createCatBtn").click(function (e) {
            e.preventDefault();
            let catName,description;
            catName=$("#catName").val().trim();
            description=$("#catDescription").val().trim();
            let subCatId=$("#parentCombo").find(":selected").val();
           let data= {
                'name':catName,
                'type':catType,
                 'description':description,
               'parentId':subCatId,
            };
           ajaxSendRequest(data,"{{route('category.store')}}");
            $("#userTable").DataTable().draw();
            updateCats();



        });
        //CreateCatEnd
        //***************************************************************************************
        let fillDataTable=(catFilter=0)=>{
            let parentId=$("#parentCombo").find(":selected").val();//parent id of subcat
            let dataTable= $('#userTable').DataTable({
                processing: true,
                serverSide: true,
                "language": {
                    "infoFiltered":   "(جستجو شده  از _MAX_  موضوع)",
                    "lengthMenu":     "نمایش _MENU_ موضوع",
                    "search": "جستجو",
                    "processing":"درحال پردازش",
                    "emptyTable":'موضوعی یافت نشد',
                    "infoEmpty":"نمایش 0 موضوع از 0 موضوع ",
                    "loadingRecords":"درحال بارگزاری ",
                    "zeroRecords":"موضوعی با این نام یافت نشد",
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
                    url:"{{route('category.index')}}",
                    data:{
                        filterRole:catFilter,
                        catParent:parentId,
                    }
                },
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'catType', name: 'catType'},
                    {data: 'catSubCount', name: 'catSubCount'},
                    {data: 'catParent', name: 'catParent'},
                    {data: 'action', name: 'action', orderable: true, searchable: true},
                ]
            });
        };
        fillDataTable(0);
        updateCats();
        //***************************************************************************************

        //------------------------------------------------------------------------------------------------------------

        //*********************************** Delete Action  *************************************
        $('body').on('click', '.delete', function () {
            editRecordId = $(this).attr("id");
            let cancle=confirm("آیا شما می خواهید این دسته را حذف کنید؟");
            if(!cancle) return false;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(filterCat>0)
            {
                $.ajax({
                    type: "POST",
                    url:"{{route('deleteSub')}}",
                    data:{
                        'id':editRecordId,
                    },
                    success: function (data) {
                        $("#userTable").DataTable().draw();
                        alert(data);
                        updateCats();

                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }
            else{
                $.ajax({
                    type: "DELETE",
                    url: "/category"+'/'+editRecordId,
                    success: function (data) {
                        $("#userTable").DataTable().draw();
                        alert(data);
                        updateCats();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            }

        });

        //*********************************** Delete Action  *************************************


        //------------------------------------------------------------------------------------------------------------

    });
</script>
    @stop
