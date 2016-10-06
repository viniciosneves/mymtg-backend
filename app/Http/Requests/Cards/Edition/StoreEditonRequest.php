<?php 

namespace Balbi\MyMtg\Http\Requests\Cards\Edtion;

use Balbi\MyMtg\Common\Http\Requests\Request;

class StoreEdtionRequest extends Request 
{

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}   
