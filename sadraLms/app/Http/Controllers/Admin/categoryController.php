<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use PHPUnit\Util\Json;
use phpDocumentor\Reflection\Types\Array_;
use Validator,Redirect,Response;

class categoryController extends Controller
{



    public function filterCat($filter)
    {
        $data='';
         if($filter==1) {
         $data=new SubCategory();
         $data=$data->all();}
         else if($filter==0){
             $data=Category::with('SubCategory')->get();
         }
         return $data;
    }

    /**
     * Display a listing of the resource.
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
            $categories=$this->filterCat(0);
            if(\request()->ajax())
            {
                if(!empty($request->get('filterRole')))
                    $categories=$this->filterCat($request->get('filterRole'));
                $datatable=datatables()->of($categories)->addColumn('catType',function ($data){
                    if(is_null($data->parentId))
                        return "سردسته";
                    else
                        return "زیر دسته";
                })->rawColumns(['catType'])->
                addColumn('catSubCount',function ($data){
                    if(is_null($data->parentId))
                        return  Category::find($data->id)->SubCategory()->get()->count();//count of subCats
                    else{
                        return 'ندارد';
                    }
                })->rawColumns(['catSubCount'])->
                addColumn('catParent',function ($data){
                    if(is_null($data->parentId))
                        return 'ندارد';
                    else
                    {
                        $parentName=SubCategory::find($data->id)->get()->first()->parentId;
                        return Category::find($parentName)->get()->first()->name;

                    }

                })->rawColumns(['catParent'])->
                addColumn('action',function ($data){
                    $button='<a href="javascript:void(0)" class="edit btn btn-success btn-sm" id="'.$data->id.'">ویرایش</a>';
                    $button.="&nbsp;&nbsp";
                    $button.='<a href="javascript:void(0)" class="delete btn btn-danger btn-sm" id="'.$data->id.'">حذف</a>';
                    return $button;
                })->rawColumns(['action'])->make(true);



                return $datatable;
            }
          return view('panel.adminBlade.category',compact("categories"));
        }
        catch (\Exception $exception)
        {
            $exception->getMessage();
        }
    }




    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    protected function categoryFailMessage()
    {
        return [
            'description.persian_alpha' => 'توضیحات  دسته بندی باید حروف فارسی باشد',
            'name.required' => 'نام دسته بندی بنمیتواند خالی باشد',
            'name.persian_alpha' => 'نام دسته بندی باید فارسی  باشد',
        ];
    }

    protected function categoryRules()
    {
        return [
            'description' => 'persian_alpha',
            'name' => 'required|persian_alpha',
            'type'=>'integer',
        ];
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $valid=Validator::make( $request->all(), $this->categoryRules(),$this->categoryFailMessage());
            $valid->validate();
            if($request->type>0)
            {
                SubCategory::updateOrCreate(['id' => $request->id],
                    [
                        'name' => $request->name,
                        'description' => $request->description,
                        'parentId'=>$request->parentId,
                    ]);
                return response()->json('زیر دسته با موفقیت ایجاد شد ');
            }
            else{
                Category::updateOrCreate(['id' => $request->id],
                    [
                        'name' => $request->name,
                        'description' => $request->description,
                    ]);
                return response()->json('دسته بندی با موفقیت ایجاد شد ');
            }
        }
        catch (ValidationException $e)
        {
            return response()->json($e->errors());
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json($this->filterCat(0));
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
     * @param int $id
     * @param Request $request
     * @return void
     */
    public function destroy($id)
    {
        if(Category::destroy($id)) return response()->json('دسته بندی با موفقیت حذف شد');
    }
    public function destroySub(Request $request)
    {
        if(SubCategory::destroy($request->id)) return response()->json('زیر دسته با موفقیت حذف شد ');
    }
    public function showCatsApi()
    {
        $ret='';
        $data=Category::with('SubCategory')->get();
        if($data->count()>0)
        {
            foreach ($data as $item)
            {
                $ret.="<option value=".$item->id."> $item->name </option>";
            }
            return $ret;
        }
        else{
        return "<option value=\"0\"> دسته بندی موجود نیست </option>";

    }
    }

}
