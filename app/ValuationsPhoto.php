<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ValuationsPhoto extends Model
{
    protected $fillable = [
        'code', 'foto'
    ];

    protected $table         = 'valuations_photo';
    public    $timestamps    = false;
    protected $primaryKey    = 'id';
}
