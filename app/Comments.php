<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'id_event', 'id_user', 'table', 'comment'
    ];

    public $timestamps    = false;
    protected $table      = 'comments';
    protected $primaryKey = 'id_comments';
}
