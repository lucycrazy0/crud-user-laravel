<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forms extends Model
{
    protected $table = 'forms';

    protected $fillable = [
        'id', 'title', 'user_id',
    ];

    public function submissions()
    {
        return $this->hasMany('App\Submissions', 'form_id','id');
    }

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
}
