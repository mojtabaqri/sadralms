@extends('layouts.app')
@section('title')
    ویرایش دوره
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-content">
                    <div class="card-body " style="direction: rtl ;text-align: right">
                        <h4 class="card-title">ویرایش دوره  برای تست</h4>
                        <div class=" col-12 d-inline-flex mb-2 mt-2">
                            <div class="col-3">
                                <fieldset class="form-group">
                                    <label for="cName"> نام دوره </label>
                                    <input type="text" class="form-control" id="cName" placeholder="نام دوره را وارد کنید">
                                </fieldset>
                            </div>
                            <div class="col-3">
                                <fieldset class="form-group">
                                    <label for="cPartPrice"> قیمت هر پارت  </label>
                                    <input type="text" class="form-control" id="cPartPrice" placeholder="به ریال وارد کنید">
                                </fieldset>
                            </div>
                            <div class="col-3">
                                <fieldset class="form-group">
                                    <label for="cPrice"> قیمت کل دوره  </label>
                                    <input type="text" class="form-control" id="cPrice" placeholder="به ریال وارد کنید">
                                </fieldset>
                            </div>
                            <div class="col-3">
                                <fieldset class="form-group">
                                    <label for="cDiscount"> تخفیف  دوره  </label>
                                    <input type="text" class="form-control" id="cDiscount" placeholder="به درصد وارد کنید">
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-12  d-inline-flex mb-2 mt-2">
                            <div class="col-10">
                                <textarea name="content" id="content" > توضیح</textarea>
                            </div>
                            <div class="col-2">
                                <fieldset class="form-group">
                                    <label for="cDiscount"> تصویر بند انگشتی     </label>
                                    <input type="file" class="form-control" id="previewThumb" name="thumbnail">
                                </fieldset>
                            </div>
                        </div>

                        <div class="col-12 d-inline-flex mt-2 mb-2">
                            <div class="col-4">
                                <h5> آپلود پیشنمایش دوره</h5>
                            <input type="file"   id="videoThumb" name="videoThumb"  >
                            </div>
                            <div class="offset-8"></div>
                        </div>


                        <!--  Upload Course And Files !-->

                        <div class="filesHolder col-12 d-block mt-2 mb-2">
                        <h4> فایل های دوره :</h4>
                            <div class="filesInput col-12 mt-2 mb-2 d-inline-flex">
                              <div class="col-3">
                                  <fieldset class="form-group">
                                      <label for="cPartName"> نام  پارت  </label>
                                      <input type="text" class="form-control" id="cPartName" placeholder="پارت">
                                  </fieldset>
                              </div>
                              <div class="col-3">
                                  <fieldset class="form-group">
                                      <label for="cPartDescription"> نامک انگلیسی     </label>
                                      <input type="text" class="form-control" id="cPartDescription" placeholder="نامک انگلیسی ">
                                  </fieldset>
                              </div>
                              <div class="col-3">
                                  <fieldset class="form-group">
                                      <input type="file" class="form-control" id="cFile">
                                  </fieldset>
                              </div>
                              <div class="col-3">
                                  +
                              </div>
                            </div>
                        </div>
                        <!--  Upload Course And Files !-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('coustom-js')

    @endsection
