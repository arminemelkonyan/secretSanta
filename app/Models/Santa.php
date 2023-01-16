<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Santa extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'sender_user_id',
        'recipient_user_id'
    ];

    protected $appends =["name","email","created_at"];
    protected $hidden=["id"];

    public function getNameAttribute()
    {
        if(!empty($this->attributes['recipient_user_id'])){
            $user = User::query()->where("id",$this->attributes['id'])->first();
            if(!is_null($user)){
                return $user->name;
            }

        }
        return "No name";
    }
    public function getEmailAttribute()
    {
        if(!empty($this->attributes['recipient_user_id'])){
            $user = User::query()->where("id",$this->attributes['id'])->first();
            if(!is_null($user)){
                return $user->email;
            }

        }
        return "No email";
    }
    public function getCreatedAtAttribute()
    {
        if(!empty($this->attributes['recipient_user_id'])){
            $user = User::query()->where("id",$this->attributes['id'])->first();
            if(!is_null($user)){
                return $user->created_at;
            }

        }
        return "No email";
    }
}
