<?php

namespace Compredict\API\Resources;

use Compredict\API\Client;
use Compredict\API\Resource;

class Algorithm extends Resource
{

    public function __construct($object = false)
    {
        parent::__construct($object);
        $this->last_result = null;
    }

    public function predict($data, $evaluate=true, $encrypt=false)
    {
        $this->last_result = $this->client->getPrediction($this->id, $data, $evaluate, $encrypt);
        return $this->last_result;
    }

    public function getDetailedTemplate($type='input')
    {
        $this->client->getTemplate($this->id, $type);
    }

    public function getDetailedGraph($type='input')
    {
        $this->client->getGraph($this->id, $type);
    }

    public function getResponseTime()
    {
        return $this->result;
    }

    public function getTemplate($type='input')
    {
        return ($type=='output') ? $this->output_format : $this->features_format;
    }

    public function getLastPredictions()
    {
        return $this->last_result;
    }
}