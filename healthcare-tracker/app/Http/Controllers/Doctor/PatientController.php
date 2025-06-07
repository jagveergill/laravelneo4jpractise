<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        // Show all registered patients
        $patients = User::where('role', 'patient')->get();

        return view('doctor.patients.index', compact('patients'));
    }

    public function conditions()
    {
        $patients = User::where('role', 'patient')->get();

        return view('doctor.patients.conditions', compact('patients'));
    }

    public function storeCondition(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:users,id',
            'condition' => 'required|string|max:255',
        ]);

        $neo4j = app(\App\Services\Neo4jService::class)->getClient();

        $neo4j->run(
            'MERGE (p:Patient {id: $id})
             MERGE (c:Condition {name: $condition})
             MERGE (p)-[:HAS_CONDITION]->(c)',
            [
                'id' => (string) $request->patient_id,
                'condition' => $request->condition
            ]
        );

        return redirect()->back()->with('success', 'Condition added.');
    }
}
