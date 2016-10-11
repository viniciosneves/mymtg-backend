<?php

namespace Balbi\MyMtg\Models\Cards;

use Balbi\MyMtg\Common\Model\EloquentModel as Model;

class Artist extends Model
{
    protected $table = 'artists';

    protected $fillable = ['name','phone'];
}
