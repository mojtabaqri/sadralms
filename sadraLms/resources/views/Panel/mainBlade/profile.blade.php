@extends('layouts.app')
@section('title')
تنظیمات پروفایل شما
@stop
@section('content')
    <section id="profile-info">
        <div class="row">
            <div class="col-lg-3 col-12 text-right">
                <div class="card">
                    <div class="card-header text-right">
                        <h4>درباره من</h4>
                        <i class="feather icon-more-horizontal cursor-pointer"></i>
                    </div>
                    <div class="card-body">
                        <p>@if(empty($info->userBio))@else{{$info->userBio}}@endif</p>
                        <div class="mt-1">
                            <h6 class="mb-0">محل زندگی</h6>
                            <p> @if(empty($info->userCity))@else{{$info->userCity}}@endif</p>
                        </div>
                        <div class="mt-1">
                            <h6 class="mb-0">پست الکترونیکی</h6>
                            <p>{{auth()->user()->email}}</p>
                        </div>
                        <div class="mt-1">
                            <h6 class="mb-0">وبسایت</h6>
                            <p> @if(empty($info->userWeb))@else{{$info->userWeb}}@endif</p>
                        </div>
                        <div class="mt-1">
                            <a href="https://telegram.com/@if(empty($info->userTeleId))@else{{$info->userTeleId}}@endif"> <button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25 waves-effect waves-light"><i class="feather icon-facebook"></i></button></a>
                            <a href="https://instagram.com/@if(empty($info->userInstaId))@else{{$info->userInstaId}}@endif"><button type="button" class="btn btn-sm btn-icon btn-primary mr-25 p-25 waves-effect waves-light"><i class="feather icon-instagram"></i></button></a>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">

                            <div class="col-xl-6 col-md-6 col-6 mb-1 text-right">
                                <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userEmail">ایمیل شما</label>
                                    <input value="{{auth()->user()->email}}" type="text" readonly class="form-control" id="userEmail" placeholder="ایمیل شما ">
                                </fieldset>
                            </div>
                       {{-- End email textbox--}}
                                <div class="col-md-6 col-12 mb-1">
                                    <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userName">نام شما </label>

                                    <input type="text" class="form-control" id="userName" placeholder="First name"  value="@if(empty(auth()->user()->name))@else{{auth()->user()->name}}@endif" required="">
                                    <div class="valid-tooltip">
                                        صحیح است
                                    </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userLname">نام خانوادگی </label>

                                    <input type="text" class="form-control" id="userLname" placeholder="نام خانوادگی شما"  value="@if(empty(auth()->user()->lname))@else{{auth()->user()->lname}}@endif" required="">
                                    <div class="valid-tooltip">
                                        صحیح است
                                    </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6 col-12 mb-1">
                                    <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userAddress">آدرس</label>
                                    <input  value="@if(empty(auth()->user()->address))@else{{auth()->user()->address}}@endif" type="text" class="form-control" id="userAddress" placeholder="آدرس شما" required="">
                                    <div class="invalid-tooltip">
                                        لطفا ادرس را صحیح وارد کنید
                                    </div>
                                    </fieldset>
                                </div>

                            <div class="col-md-4 col-6 mb-1">
                                <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userCity"> شهر محل زندگی :</label>
                                    <input  value="@if(empty($info->userCity))@else{{$info->userCity}}@endif" type="text" class="form-control" id="userCity" placeholder=" شه رمحل زندگی" required="">
                                    <div class="invalid-tooltip">
                                        لطفا شهر  را صحیح وارد کنید
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4 col-6 mb-1">
                                <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userTeleId">   شناسه تلگرام :</label>
                                    <input  value="@if(empty($info->userTeleId))@else{{$info->userTeleId}}@endif" type="text" class="form-control" id="userTeleId" placeholder=" شناسه تلگرام  " required="">
                                    <div class="invalid-tooltip">
                                        لطفا شناسه   را صحیح وارد کنید
                                    </div>
                                </fieldset>
                            </div>

                            <div class="col-md-4 col-6 mb-1">
                                <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userInstaId">   شناسه ایسنتاگرام :</label>
                                    <input  value="@if(empty($info->userInstaId))@else{{$info->userInstaId}}@endif" type="text" class="form-control" id="userInstaId" placeholder=" شناسه ایسنتاگرام" required="">
                                    <div class="invalid-tooltip">
                                        لطفا شناسه   را صحیح وارد کنید
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-12 col-6 mb-1">
                                <fieldset class="form-group text-right" style="direction: rtl" >
                                    <label for="userWeb">   آدرس وبسایت شما  :</label>
                                    <input  value="@if(empty($info->userWeb))@else{{$info->userWeb}}@endif" type="text" class="form-control" id="userWeb" placeholder=" آدرس وبسایت شما " required="">
                                    <div class="invalid-tooltip">
                                        لطفا  آدرس وبسایت   را صحیح وارد کنید
                                    </div>
                                </fieldset>
                                <div class="d-none alert alert-danger profileUpdaterError">
                                </div>

                            </div>
                            </div>
                    </div>
                </div>
{{--Aboutme Text Area--}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">درباره من</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body text-right">
                            <p class="text-right" style="direction: rtl">ویرایش متن درباره من در  <code>جعبه متن زیر</code>.</p>
                            <div class="row">
                                <div class="col-12">
                                    <fieldset class="form-group">
                                        <label for="userBio"></label><textarea class="form-control" id="userBio" rows="3" placeholder="درباره من ">@if(empty($info->userBio))@else{{$info->userBio}}@endif</textarea>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
{{--Aboutme Text Area--}}

            </div>
            <div class="col-lg-3 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>تصویر پروفایل شما </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12 text-center">
                                <img width="90px" height="90px" src="{{(__('profiles/')).auth()->user()->rootAddress."/profile.jpg"}}" class=" round img-fluid mb-1 rounded-circle" id="avatarHolder" alt="avtar img holder">
                                <div class="form-group">
                                    <form method="post" action="" enctype="multipart/form-data" id="myform">
                                        <div class="form-group" >
                                            <label for="file" id="picUploaderMsg" > بارگزاری تصویر جدید</label>
                                            <input type="file" id="file" name="file" />
                                            <input type="button" class="button" value="Upload" id="but_upload">
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4> حریم خصوصی  </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 col-12 text-center">
                                <form action="" name="" enctype="application/x-www-form-urlencoded">
                                    <label for="changeUserName">پست الکترونیک    </label>
                                    <input value="{{auth()->user()->email}}" type="text" id="changeUserName" class="form-control" placeholder="نام کاربری " >
                                    <p><small class="text-muted">پست الکترونیک   خود را تغیر دهید</small></p>

                                    <label for="changePass">گذرواژه شما    </label>
                                    <input  type="password" id="changePass" class="form-control" placeholder=" گذرواژه خود را وارد کنید " >
                                    <p><small class="text-muted"> گذرواژه خود را تغیر دهید</small></p>


                                    <label for="changeConfirm"> تکرار مجدد گذرواژه   </label>
                                    <input type="password" id="changeConfirm" class="form-control" placeholder=" تکرار گذرواژه " >
                                    <button id="changeConfirmBtn" type="button" class="btn btn-primary">اعمال تغیرات</button>

                                    <div class="alert alert-danger" id="errorBox" style="display: none">

                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button id="save" type="button" class="btn btn-primary block-element waves-effect waves-light">ذخیره</button>
            </div>
        </div>
    </section>
@stop
@section('coustom-js')
    <script>
        $(document).ready(function () {
            //Upload Profile Picture
            let errorMessage=(message,color)=>{
                $("#picUploaderMsg").text(message);
                $("#picUploaderMsg").css('color',color);
            };
            let defaultLblMessage=()=>{
                setTimeout(function () {
                    errorMessage('بارگزاری تصویر جدید','black');
                },3000);
            };

            $("#but_upload").click(function(){
                let fd = new FormData();
                let files = $('#file')[0].files[0];
                fd.append('file',files);
                let type=files.type;
                let size=files.size;
                 if(type=='image/jpeg')
                {
                    if(size>1000000)
                    {
                        errorMessage('حجم فایل انتخابی بیش از 120 کیلوبایت است','red');
                        defaultLblMessage();
                        return false;
                    }
                    else{

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            url:'{{route('picUploader')}}',
                            type:'post',
                            data:fd,
                            contentType: false,
                            processData: false,
                            catch:false,
                            success:function(response){
                                if(response != 0){
                                    alert('تصویر پروفایل شما با موفقیت تغیر کرد ');
                                    setTimeout(function () {
                                        $("#avatarHolder").attr('src',"/profiles/"+"{{auth()->user()->rootAddress}}"+"/profile.jpg");
                                    },1500);
                                }else{
                                    alert('متاسفانه مشکلی پیش امده است ');
                                }
                            }
                        });

                    }
                }
                else {
                    errorMessage('پسوند فایل انتخابی مجاز نیست !','red');
                    defaultLblMessage();
                    return false;
                }

            });

            //Upload Profile Picture
            //Profile Updater
            //------------------------------- Success Message Handler --------------------------------
            let errorHandler=(response)=>{
                const propertiesToCheck = ["userName", "userAddress", "userLname", "userTeleId", "userInstaId", "userCity", "userWeb"];
                propertiesToCheck.forEach(property =>
                {
                    if (response.hasOwnProperty(property))
                    {
                        $("#"+property).val(response[property]);
                        $("#"+property).css('color','red');
                        setTimeout(function () {
                            $("#"+property).val('');
                            $("#"+property).css('color','black');
                        },3500);

                    }

                });
            };

            //---------------------------------------Public Vars -----------------------------------------------
            let userName,userAddress,userLname,userBio,userTeleId,userInstaId,userCity,userWeb;
            //---------------------------------------Public Vars -----------------------------------------------
            //------------------------------- Success Message Handler --------------------------------
             $("#save").click(function (e) {
                 e.preventDefault();
                 userName=$("#userName");
                 userAddress=$("#userAddress");
                 userLname=$("#userLname");
                 userBio=$("#userBio");
                 userTeleId=$("#userTeleId");
                 userInstaId= $("#userInstaId");
                 userCity=$("#userCity");
                 userWeb= $("#userWeb");
                let data= {
               "userName": userName.val().trim(),
               "userAddress" : userAddress.val().trim(),
               "userLname" : userLname.val().trim(),
               "userBio" : userBio.val().trim(),
              "userTeleId" :userTeleId.val().trim(),
              "userInstaId" :userInstaId.val().trim(),
              "userCity" : userCity.val().trim(),
              "userWeb" :userWeb.val().trim(),};
                 $.ajax({
                     type: 'post',
                     url: '{{route('profileUpdater')}}',
                     data: {
                         'id':"{{auth()->user()->id}}",
                         'data':data,
                         "_token": '{{ csrf_token() }}',
                     },
                     cache: false,
                     success: function(res){
                         if(res==='1'){
                             alert('با موفقیت انجام شد!');
                             return true;
                         }
                       return   errorHandler(res);
                     }
                 });
             });
            //end Profile Updater

            // Change pass
            $("#changeConfirmBtn").click(function (e) {
                e.preventDefault();
                let email,password,confirm;
                email=$("#changeUserName").val().trim();
                password=$("#changePass").val().trim();
                confirm=$("#changeConfirm").val().trim();
                if(password!=confirm)
                {
                    alert('گذروآزه و تکرار آن صحیح نیست!');
                    return false;
                }
                $.ajax({
                    type: 'post',
                    url: '{{route('privacyUpdater')}}',
                    data: {
                        'email':email,
                        'id':"{{auth()->user()->id}}",
                        "password":password,
                        "password_confirmation":confirm,
                        "_token": '{{ csrf_token() }}',
                    },
                    cache: false,
                    success: function(res){
                       if(res==0)
                       {
                           $("#changeUserName").val(email);
                           return  alert('با موفقیت تغیر یافت');
                       }
                       $("#errorBox").text(res);
                        $("#errorBox").slideDown();
                       setTimeout(function () {
                           $("#errorBox").slideUp();
                       },'2000');
                        return false;
                    }
                });

            });

            //Change Pass
        });
    </script>
@stop
