<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return Data::all();
    }

    public function saveDataDiagram(Request $request) {
        return $request;
    }
    public function getDataDiagram() {
        return '1111111111111111111111';
    }
}

