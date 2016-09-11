<?php

namespace Balbi\MyMtg\Common\Http\Support;

use Exception;
use ArrayAccess;
use Carbon\Carbon;
use JsonSerializable;
use DateTimeInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Contracts\Support\Arrayable;

class BaseJsonResponseMessage implements Jsonable, JsonSerializable
{

    protected $data;
    protected $erros;

    public function __construct($data = [])
    {
       $this->setData($data);
    }

    public function setData($data)
    { 
        if($data instanceof Arrayable)
            $this->data = $data->toArray();
        else if(is_array($data))
            $this->data = $data;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setErrors($erros)
    {
        $this->erros = $erros;
    }

    public function getErrors()
    {
        return $this->erros;
    }

    public function jsonSerialize()
    {
        return $this->serializeResponse();
    }

    public function toJson($options = 0)
    {
        return $this->serializeResponse();
    }

    private function serializeResponse()
    {
        $responseObject = new \stdClass();

        if (!empty($this->data)) {
            $responseObject->data = $this->data;
        }

        if (!empty($this->erros)) {
            $responseObject->errors = $this->erros;
        }

        $this->validateResponse($responseObject);

        return json_encode($responseObject);
    }

    private function validateResponse($responseObject)
    {

        if (isset($responseObject->data) && isset($responseObject->errors)) {
            throw new \Exception("Data and Erros should not be sent together");
        }
    }
}
