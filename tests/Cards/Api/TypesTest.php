<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TypesTest extends TestCase
{

    protected $maxTypes = 8;

    protected $resourceRoute = "api/card/type";

    protected $jsonStructure = [
            'created_at',
            'name',
            'permanent',
            'id'
        ];
    /**
    * @test   
    */
    public function shouldReturnTypesWithCorrectStructure()
    {
        $result = $this->json('GET',$this->resourceRoute)->assertResponseOK()
        ->seeJsonStructure([$this->jsonStructure]);

        //asserting that there is only 8 types of cards
        $this->assertEquals($result->response->original->count(),$this->maxTypes);
    }

    /**
    * @test
    */
    public function shouldReturnOneTypeWithCorrectStructure()
    {
        $id = mt_rand(1,$this->maxTypes);

        $this->json('GET',$this->resourceRoute.'/'.$id)
            ->assertResponseOK()
            ->seeJsonStructure($this->jsonStructure);
    }


    /**
    * @test
    */
    public function shouldNotEditType()
    {
        $this->json('POST',$this->resourceRoute,['name' => 'shouldNotWork', 'permanent' => false ])
            ->assertResponseStatus(405);

        $this->json('PUT',$this->resourceRoute,['name' => 'shouldNotWork', 'permanent' => false ])
            ->assertResponseStatus(405);

        $this->json('DELETE',$this->resourceRoute,['name' => 'shouldNotWork', 'permanent' => false ])
        ->assertResponseStatus(405);
    }

}
