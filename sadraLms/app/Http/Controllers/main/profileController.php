<?php

namespace App\Http\Controllers\main;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Array_;
use Validator,Redirect,Response;
use function MongoDB\BSON\toJSON;


class profileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $full_path = 'userassets/'.auth()->user()->rootAddress.'/info.json';
        $info = json_decode(Storage::get($full_path));
        return view('Panel.mainBlade.profile',compact("info"));
    }

    protected function ProfileUpdaterFailMessage()
    {
        return [
            'userName.required' => 'نام شما نمیتواند خالی باشد',
            'userName.persian_alpha' => 'نام شما باید حروف فارسی باشد',
            'userLname.required' => 'نام خانوادگی بنمیتواند خالی باشد',
            'userLname.persian_alpha' => 'نام خانوادگی باید حروف فارسی باشد',
            'userAddress.address'=>'فرمت ادرس صحیح نمیباشد',
            'userAddress.persian_alpha'=>'آدرس باید حروف فارسی باشد',
            'userTeleId.is_not_persian'=>'شناسه تلگرامی  فقط حروف انگلیسی میتواند باشد',
            'userCity.is_not_persian'=>'شناسه تلگرامی  فقط حروف انگلیسی میتواند باشد',
            'userInstaId.is_not_persian'=>'شناسه تلگرامی  فقط حروف انگلیسی میتواند باشد',
        ];
    }
    protected function ProfileUpdaterRules()
    {
       return [
           'userName' => 'required|persian_alpha',
           'userLname' => 'required|persian_alpha',
           'userAddress'=>'address|persian_alpha',
           'userTeleId'=>'is_not_persian',
           'userInstaId'=>'is_not_persian',
           'userCity'=>'persian_alpha',
       ];
    }
    public function profileUpdater(Request $request)
    {
        try {
            $valid=Validator::make( $request->get('data'), $this->ProfileUpdaterRules(),$this->ProfileUpdaterFailMessage());
            $valid->validate();
//            Save and Update Data
            $user=User::find($request->get('id'));
            $user->name=$request->get('data')['userName'];
            $user->lname=$request->get('data')['userLname'];
            $user->address=$request->get('data')['userAddress'];
            $jsonNoSql=[
                'userBio'=>$request->get('data')['userBio'],
                'userTeleId'=>$request->get('data')['userTeleId'],
                'userInstaId'=>$request->get('data')['userInstaId'],
                'userCity'=>$request->get('data')['userCity'],
                'userWeb'=>$request->get('data')['userWeb'],
            ];
            $jsonNoSql=json_encode($jsonNoSql);
            if($user->save())
            {
                $full_path = 'userassets/'.$user->rootAddress.'/info.json';
                Storage::put($full_path, $jsonNoSql);
                return 1;
            }
//            Save And Update Data
        } catch (ValidationException $e)
        {
            return response()->json($e->errors());
        }

    }

    public function uploadPic(Request $request)
    {
            $file = $request->file('file');
            $fileExt=$file->getClientOriginalExtension();
            $validExtension = array("jpg", "JPG");
            if(in_array($file,$validExtension)) {return 'invalid Extension!';}
            else if($file->getSize()>100000){return "invalid file size!";}
            $picName=$file->getClientOriginalName();
            $newPicName="profile.jpg";
            $path="profiles/".auth()->user()->rootAddress;
            if($file->move($path,$newPicName))
            {
                return 1;
            }
            else{
                return "0";
            }


    }

    protected function rules($bool)
    {

        if(!$bool) {
            return [
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8'
            ];
        }
        return[
            'email' => 'required|email',
            'password' => 'required|min:8'
        ];
    }

    protected function failMessage()
    {
        return [
                'password.confirm'=>'لطفا تکرار گذرواژه خود را به صورت صحیح وارد کنید ',
                'password.min'=>' حداثل طول پسورد 8 رقم میباشد',
                'password.required'=>' گذرواژه نمیتواند خالی باشد ',
                'email.required'=>' ایمیل نمیتواند خالی باشد ',
                'email.email'=>' فرمت ایمیل وارد شده صحیح نیست',
                'email.unique'=>'ااین پست الکترونیکی قبلا ثت شده است',
        ];
    }

    public function privacyUpdater(Request $request)
    {
        $bool=true;
        $user = User::find($request->get('id'));
        if($request->get('email')!=$user->email)$bool=false;
        $validator = Validator::make($request->all(),$this->rules($bool),$this->failMessage());
        if($validator->fails())
        {
            foreach ($validator->messages()->getMessages() as $field_name => $messages)
            {
                return $messages;
            }
        }
        else{
            //if data valid
            try{
         $user->password=bcrypt($request->get('password'));
         $user->email=$request->get('email');
         if($user->save())
         {
             return "اطلاعات با موفقیت تغیر مرد!";
         }
            }
            catch (\Exception $e)
            {
                return $e->getMessage();
            }


        }
    }




}
