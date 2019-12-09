<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function Files()
    {
        return $this->hasMany(Files::class,'courseId');
    }
    protected $fillable = [
        'id','title', 'courseRoot', 'publish','description',
    ];
}
