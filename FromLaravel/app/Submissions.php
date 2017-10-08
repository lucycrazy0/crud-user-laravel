<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submissions extends Model
{
    protected $table = 'submissions';

    protected $fillable = [
        'form_id',
    ];

    public function forms()
    {
        return $this->hasOne('App\Forms', 'id','form_id');
    }

    public function formsubmission()
    {
        return $this->hasMany('App\FormSubmissions','submission_id','id');
    }

}
