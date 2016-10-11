<?php

namespace Balbi\MyMtg\Models\Cards;

use Balbi\MyMtg\Common\Model\EloquentModel as Model;
use Balbi\MyMtg\Models\Cards\Block;

class Edition extends Model
{
    protected $table = "editions";
    
    protected $fillable = ['name', 'release_date', 'initials', 'cards_amount', 'block_id'];
    
    
    public function block()
    {
        return $this->hasOne(Block::class,'id', 'block_id');
    }
    
}
