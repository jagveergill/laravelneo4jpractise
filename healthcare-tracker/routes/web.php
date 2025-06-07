<?php

use App\Http\Controllers\Neo4jDemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/neo4j-demo', [Neo4jDemoController::class, 'test']);

