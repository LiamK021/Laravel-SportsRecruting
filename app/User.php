<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Images;
use App\Videos;
use App\Messages;
Use App\Type;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','api_token','address','state','position','grade','year', 'sport','type_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];

    public function user_images(){
        return $this->hasMany(Images::class, 'user_id');
    }

    public function user_videos(){
        return $this->hasMany(Videos::class, 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'leader_id', 'follower_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'leader_id')->withTimestamps();
    }

    public function senders()
    {
        return $this->hasMany(Messages::class, 'sender_id');
    }

    public function receivers()
    {
        return $this->hasMany(Messages::class, 'receiver_id');
    }

    public function type(){
        return $this->hasOne(Type::class, 'id', 'type_id');
    }
}
