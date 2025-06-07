<?php

namespace App\Services;

use Laudis\Neo4j\ClientBuilder;

class Neo4jService
{
    protected $client;

    public function __construct()
    {
        $this->client = ClientBuilder::create()
            ->withDriver('neo4j', 'bolt://neo4j:password@neo4j:7687') // bolt port
            ->build();
        
    }

    public function getClient()
    {
        return $this->client;
    }
}
