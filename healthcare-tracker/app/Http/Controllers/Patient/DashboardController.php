<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Services\Neo4jService;

class DashboardController extends Controller
{
    public function index(Neo4jService $neo4j)
    {
        $user = Auth::user();

        $client = $neo4j->getClient();

        // Query conditions assigned to this patient
        $result = $client->run(
            'MATCH (p:Patient {id: $id})-[:HAS_CONDITION]->(c:Condition)
             RETURN c.name AS condition',
            ['id' => (string) $user->id]
        );

        $conditions = [];
        foreach ($result as $record) {
            $conditions[] = $record->get('condition');
        }

        return view('patient.dashboard', compact('conditions'));
    }

    public function graph(Neo4jService $neo4j)
    {
        $user = Auth::user();
        $client = $neo4j->getClient();

        $result = $client->run(
            'MATCH (p:Patient {id: $id})-[:HAS_CONDITION]->(c:Condition)
         RETURN p.name AS patient, p.id AS pid, collect({name: c.name}) AS conditions',
            ['id' => (string) $user->id]
        );

        $graphData = [];

        foreach ($result as $record) {
            $patientName = $record->get('patient');
            $conditions = $record->get('conditions');

            $graphData['nodes'][] = ['id' => 'patient', 'label' => $patientName, 'shape' => 'box'];

            foreach ($conditions as $index => $condition) {
                $nodeId = 'condition_' . $index;
                $graphData['nodes'][] = ['id' => $nodeId, 'label' => $condition['name']];
                $graphData['edges'][] = ['from' => 'patient', 'to' => $nodeId];
            }
        }

        return view('patient.graph', ['graphData' => json_encode($graphData)]);
    }

}
