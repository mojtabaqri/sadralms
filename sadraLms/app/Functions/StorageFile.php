<?php


namespace App\Functions;
use Illuminate\Support\Facades\Storage;
use App\User;

class StorageFile
{
    protected $rootAddress,$id;
    public function __construct($id)
    {
        $this->id=$id;
        $root=User::find($this->id)->first();
        $this->rootAddress=$root->rootAddress;
    }
    public function setJsonInfoFile($content=null)
    {
        if($content!=null){
            $full_path = 'userassets/'.$this->rootAddress.'/info.json';
            $content=json_encode($content);
             Storage::put($full_path, $content);
             return true;
        }
        return false;
    }
    public function getJsonInfoFile()
    {
        $full_path = 'userassets/'.$this->rootAddress.'/info.json';
        if(Storage::exists($full_path)) {
            $info = json_decode(Storage::get($full_path));
            return $info;
        }
            return false;
    }
}
