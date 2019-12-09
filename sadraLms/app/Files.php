<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    public function User()
    {
        return $this->belongsTo(User::class);
    }
    public function Course()
    {
        return $this->belongsTo(Course::class);
    }
    protected $fillable = [
        'id','courseId', 'userId','title',
    ];
}
