<?php


namespace App\Functions;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    public  function UploadFile($root,Request $request)
  {
      if($request->file('file')!=null){
          if(Storage::put($root.'/'.$request->file('file')->getClientOriginalName(), $request->file('file'))) return response()->json('true');
          return response()->json('false');
      }

  }


}
