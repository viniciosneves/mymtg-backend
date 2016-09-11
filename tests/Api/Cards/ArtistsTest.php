<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Balbi\MyMtg\Models\Cards\Artist;

class ArtistsTest extends TestCase
{
    use DatabaseTransactions;

    protected $resourceRoute = 'api/artist';

    protected $artistCreated;

    public function setUp()
    {
        parent::setUp();

        //populate a bit
         $this->artistCreated = factory(Artist::class)->create();

    }

    /**
    * @test   
    */
    public function shouldReturnArtists()
    {
        $result = $this->json('GET',$this->resourceRoute)->assertResponseOK();
        $decodedResponse = json_decode($result->response->getContent(),true);

        //asserting that there is only 6 Artists of cards
        $this->assertTrue(count($decodedResponse['data']) > 0);
    }

    /**
    * @test
    */
    public function shouldReturnOneWithCorrectStructure()
    {
        $id = $this->artistCreated->id;
        
        $this->json('GET',$this->resourceRoute.'/'.$id)
            ->assertResponseOK()
            ->seeJsonStructure([ 'data' => [
                    'created_at',
                    'name',
                    'id' 
            ]]);
    }

}
