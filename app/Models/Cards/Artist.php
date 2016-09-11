<?php

namespace Balbi\MyMtg\Models\Cards;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'artists';

    protected $fillable = ['name'];
}
