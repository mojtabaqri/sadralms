<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $table='sub_categories';
    protected $fillable = [
        'id','name','parentId','description',
    ];
}
