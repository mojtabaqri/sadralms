<?php

namespace App\Http\Controllers\Admin;

use App\Functions\StorageFile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Contracts\DataTable;
use function datatables;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */

    protected function filterRole($role)
    {
        //if roll = 4 -> system show all users without any filter
        $data="";
        if($role=="4")$data=User::latest()->get(); else$data=User::latest()->where('role',$role)->get();
        foreach ($data as $item)
        {
            if($item->role=="3")$item->role="مدیر اصلی" ;
            else if($item->role=="2")$item->role=" استاد" ;
            else $item->role=" دانشجو" ;
        }
        return $data;
    }
    public function index(Request $request)
    {
        $filterd=User::latest()->get();
        if(\request()->ajax())
        {
            if(!empty($request->get('filterRole'))) $filterd=$this->filterRole($request->get('filterRole'));
            return datatables()->of($filterd)->addColumn('action',function ($data){
                $button='<a href="javascript:void(0)" class="edit btn btn-success btn-sm" id="'.$data->id.'">ویرایش</a>';
                $button.="&nbsp;&nbsp";
                $button.='<a href="javascript:void(0)" class="delete btn btn-danger btn-sm" id="'.$data->id.'">حذف</a>';
               return $button;
                })->rawColumns(['action'])->make(true);
        }
        return view('Panel.adminBlade.users');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $infoFile=[
            "userBio"=> $request->bio,
            "userTeleId"=> $request->teleId,
            "userInstaId"=> $request->instaId,
            "userCity"=> $request->city,
             "userWeb" => $request->web
        ];
        if((isset($request->pass)))
        {
            User::updateOrCreate(['id' => $request->id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password'=>bcrypt($request->pass),
                    'lname'=>$request->lname,
                    'address'=>$request->address,
                    'role'=>$request->role,
                ]);
        }
        else{
            User::updateOrCreate(['id' => $request->id],
                [
                    'name' => $request->name,
                    'email' => $request->email,
                    'lname'=>$request->lname,
                    'address'=>$request->address,
                    'role'=>$request->role,
                ]);
        }
        $updateJsonFile=new StorageFile($request->id);
        $updateJsonFile->setJsonInfoFile($infoFile);
        return response()->json(['success'=>'محصول با موفقیت ذخیره شد.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           // $a=new  StorageFile($id);
           // return response()->json($a->getJsonInfoFile());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::find($id);
      $userInfoFile=new StorageFile($id);
      $userInfoFile=$userInfoFile->getJsonInfoFile();
          $data=[
            'user'=>$user,
            'userInfo'=>$userInfoFile,
          ];
      return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['success'=>'محصول با موفقیت حذف شد.']);

    }
}
