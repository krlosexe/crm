<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogsPhone extends Model
{
    protected  $table ="log_phone";
    protected $guarded = [];
    public    $timestamps    = false;
}
