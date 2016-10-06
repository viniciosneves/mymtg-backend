<?php 

namespace Balbi\MyMtg\Http\Requests\Cards\Edition;

use Balbi\MyMtg\Common\Http\Requests\Request;

class UpdateEditionRequest extends Request 
{

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}   
