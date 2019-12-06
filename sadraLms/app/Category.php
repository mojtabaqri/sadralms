<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function SubCategory()
    {
        return $this->hasMany(SubCategory::class,'parentId');
    }
    protected $table='categories';
    protected $fillable = [
        'id','name','description',
        ];
}
