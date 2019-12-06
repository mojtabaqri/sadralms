@extends('layouts.app')
@section('title')
    اساتید تایید نشده
@stop

@section('content')
    <div class="row">
        <div class="col-12 text-right" style="direction: ltr!important;">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> اساتید</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row"><div class="col-sm-12"><table class="table add-rows dataTable" id="DataTables_Table_3" role="grid" aria-describedby="DataTables_Table_3_info">
                                            <thead>
                                            <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Column 1: activate to sort column descending" aria-sort="ascending" style="width: 147px;">نام  استاد </th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Column 2: activate to sort column ascending" style="width: 153px;">  سمت </th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Column 3: activate to sort column ascending" style="width: 153px;">تاریخ عضویت</th><th class="sorting" tabindex="0" aria-controls="DataTables_Table_3" rowspan="1" colspan="1" aria-label="Column 4: activate to sort column ascending" style="width: 154px;">عملیات</th></tr>
                                            </thead>
                                            <tbody>

                                              @if (!empty($data))
{{--                                                  @foreach($data as $category)--}}
{{--                                                      <tr role="row" class="even">--}}
{{--                                                          <td> {{$category->name}} </td>--}}
{{--                                                          <td class="sorting_1">{{$category->id}}</td>--}}
{{--                                                          <td>{{$category->created_at}}</td>--}}
{{--                                                          <td>--}}
{{--                                                              <a href="#"><i class="m-1 feather icon-edit-2"></i></a>--}}
{{--                                                              <a href="#"><i class="feather icon-trash"></i></a>--}}
{{--                                                          </td>--}}
{{--                                                      </tr>--}}
{{--                                                      @endforeach--}}

                                              @endif

                                            </tbody>
                                            <tfoot>
                                            <tr></tr>
                                            </tfoot>
                                        </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">نمایش 10 رکورد از 1 رکورد</div></div><div class="col-sm-12 col-md-7 text-center"><div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate"><ul style="direction: ltr!important;    float: right;" class="pagination"><li class="paginate_button page-item previous disabled" id="DataTables_Table_3_previous"><a href="#" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" class="page-link">قبلی</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item next disabled" id="DataTables_Table_3_next"><a href="#" aria-controls="DataTables_Table_3" data-dt-idx="2" tabindex="0" class="page-link">بعدی</a></li></ul></div></div></div></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
