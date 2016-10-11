<?php

namespace Balbi\MyMtg\Models\Cards;

use Balbi\MyMtg\Common\Model\EloquentModel as Model;

class Block extends Model
{
    protected $table = 'blocks';

    protected $fillable = ['name'];
}
