<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Neo4jDemoController extends Controller
{
    //
    public function test(\App\Services\Neo4jService $neo4j)
    {
        $client = $neo4j->getClient();

        // Create nodes and relationships
        $client->run(
            'CREATE (p:Patient {name: $name})-[:HAS_CONDITION]->(c:Condition {name: $condition})',
            ['name' => 'Alice', 'condition' => 'Diabetes']
        );

        // Query
        $result = $client->run(
            'MATCH (p:Patient)-[:HAS_CONDITION]->(c:Condition)
         RETURN p.name AS patient, c.name AS condition'
        );

        foreach ($result as $record) {
            echo $record->get('patient') . ' has ' . $record->get('condition') . '<br>';
        }
    }

}
