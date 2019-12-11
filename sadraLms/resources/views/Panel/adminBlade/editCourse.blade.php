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
                            <div class="col-10" id="content">
                                <textarea name="content" id="contentFile" cols="30" rows="10"></textarea>
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
                              </div>
                                <div class="col-12">
                                    <!--form upload -->
                                    <form method="post" action="{{ route('UploadData') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-9">
                                                <input multiple="multiple" type="file" name="file[]" id="file" />
                                            </div>
                                            <div class="col-md-3">
                                                <input type="submit" name="upload" value="بارگذاری" class="btn btn-success" />
                                            </div>
                                        </div>
                                    </form>
                                    <br />
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" aria-valuenow=""
                                             aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                            0%
                                        </div>
                                    </div>
                                    <br />
                                    <div id="success">

                                    </div>
                                    <br />
                                    <!--form upload -->
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
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: "textarea",
            plugins: "image",
        });

    </script>

    <script type="text/javascript">

        $(document).ready(function(){

            $('form').ajaxForm({
                beforeSend:function(){
                    $('#success').empty();
                },
                uploadProgress:function(event, position, total, percentComplete)
                {
                    $('.progress-bar').text(percentComplete + '%');
                    $('.progress-bar').css('width', percentComplete + '%');
                },
                success:function(data)
                {
                    if(data.errors)
                    {
                        $('.progress-bar').text('0%');
                        $('.progress-bar').css('width', '0%');
                        $('#success').html('<span class="text-danger"><b>'+data.errors+'</b></span>');
                    }
                    if(data.success)
                    {
                        $('.progress-bar').text('بارگزاری شد');
                        $('.progress-bar').css('width', '100%');
                        $('#success').html('<span class="text-success"><b>'+data.success+'</b></span><br /><br />');
                    }
                }
            });

        });

    </script>

@endsection
@section('coustom-style')

@endsection
