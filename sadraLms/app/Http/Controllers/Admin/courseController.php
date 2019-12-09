<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class courseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $courses=Course::all();
            if(\request()->ajax())
            {
                return datatables()->of($courses)->addColumn('name',function ($data){
                return $data->name;
                })->rawColumns(['name'])->
                addColumn('master',function ($data){
               return "master";
                })->rawColumns(['master'])->
                addColumn('buyQtt',function ($data){
               return "1";
                })->rawColumns(['buyQtt'])->
                addColumn('cat',function ($data){
                    return "none";
                })->rawColumns(['cat'])->
                addColumn('action',function ($data){
                    $button='<a target="_blank" href="course/'.$data->id.'/edit " class="edit btn btn-success btn-sm" id="'.$data->id.'">ویرایش</a>';
                    $button.="&nbsp;&nbsp";
                    $button.='<a href="javascript:void(0)" class="delete btn btn-danger btn-sm" id="'.$data->id.'">حذف</a>';
                    return $button;
                })->rawColumns(['action'])->make(true);

            }
            return  view('Panel.adminBlade.course');
        }
        catch (\Exception $exception)
        {
            $exception->getMessage();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $model=Course::find($id);
        return  view('Panel.adminBlade.editCourse',compact("model"));
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
        //
    }
}
