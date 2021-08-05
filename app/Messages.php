<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    // protected = 
    //
    protected $fillable = [
        'sender_id', 'receiver_id','content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'sender_id', 'receiver_id',
    ];
    protected $primaryKey = 'id';
}
