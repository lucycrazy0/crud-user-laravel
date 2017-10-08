<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormSubmissions extends Model
{
    protected $table = 'form_submissions';

    protected $fillable = [
        'form_id', 'submission_id', 'field_name', 'field_value',
    ];

}
