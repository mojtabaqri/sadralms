<?php


namespace App\Functions;
use App\Files;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadFile
{
    protected $root;
    public  function UploadFile($root,Request $request)
  {
      $data=[];
      $rules = array(
              'file'  => 'required',
              'file.*' => 'mimes:doc,pdf,docx,zip,jpg,jpeg,rar'
          );
          $error = \Validator::make($request->all(), $rules);

          if($error->fails())
          {
              return response()->json(['errors' => $error->errors()->all()]);
          }


      if($request->hasfile('file'))
      {

          foreach($request->file('file') as $file)
          {
              $name=time().$file->getClientOriginalName();
              $file->move(public_path().'/'.$root.'/', $name);
          }
      }

      $output = array(
              'success' => 'با موفقیت آپلود شد ',
          );

          return response()->json($output);

  }


}
