<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table='transaction';
    protected $fillable = [
         'status', 'transactionId', 'userId', 'courseId',
    ];
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
