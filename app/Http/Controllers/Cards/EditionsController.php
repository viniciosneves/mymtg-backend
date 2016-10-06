<?php

namespace Balbi\MyMtg\Http\Controllers\Cards;

use Illuminate\Http\Request;
use Balbi\MyMtg\Common\Http\Requests\IndexRequest;
use Balbi\MyMtg\Http\Requests\Cards\Edition\StoreEditionRequest;
use Balbi\MyMtg\Http\Requests\Cards\Edition\UpdateEdtionRequest;
use Balbi\MyMtg\Http\Controllers\Controller;
use Balbi\MyMtg\Models\Cards\Edition;

class EditionsController extends Controller
{
    protected $edition;

    public function __construct(Edition $edition)
    {
        $this->edition = $edition;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        $query = $this->edition->with('block')->where('name','like','%'.$request->get('name','').'%');
        
        if($request->has('release_date')) {
            $query->where('realese_date', '=', $request->get('realese_date'));
        }
        
        if($request->has('initials')) {
            $query->where('initials', '=', $request->get('initials'));
        }
        
        if($request->has('cards_amount')) {
           $query->where('cards_amount', '=', $request->get('cards_amount'));
        }
        
        if($request->get('block_id') > 0) {
            $query->where('block_id', '=', $request->get('block_id'));
        }
        
                                
        
        if($request->paginate()) {
            return $this->message($query->paginate($request->perPage()));
        } else {
            return $this->message($query->get());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEditionRequest $request)
    {
        return $this->message($this->edition->create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Edition $edition)
    {
        return $this->message($edition);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEditionRequest $request, Edition  $edition)
    {
        $edition->update($request->all());
        return $this->message($edition);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Edition $edition)
    {
       return $this->message($edition->delete());
    }
}
