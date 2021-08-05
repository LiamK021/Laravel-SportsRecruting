<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    //
    protected $fillable = [
        'follower_id', 'leader_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'follower_id', 'leader_id',
    ];
    protected $primaryKey = 'id';
}
