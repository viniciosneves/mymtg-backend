<?php

namespace Balbi\MyMtg\Http\Controllers\Cards;

use Illuminate\Http\Request;

use Balbi\MyMtg\Http\Requests;
use Balbi\MyMtg\Http\Controllers\Controller;

class TypesController extends Controller
{

    protected $type;

    public function __construct(\Balbi\MyMtg\Models\Cards\Type $type)
    {
        $this->type = $type;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->type->all();
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->type->find($id);
    }
}
