<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProvider extends Model
{
    protected $fillable = ['user_id', 'image', 'provider', 'provider_id'];

    //relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
