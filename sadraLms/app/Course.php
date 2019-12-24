<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function Transaction()
    {
        return $this->hasMany(Transaction::class,'courseId');
    }
    public function Files()
    {
        return $this->hasMany(Files::class,'courseId');
    }
    protected $fillable = [
        'id','name', 'courseRoot', 'publish','description',
    ];
}
