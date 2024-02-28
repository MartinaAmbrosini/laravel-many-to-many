<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Technology;

class ApiController extends Controller
{
    public function getTest()
    {

        return response()->json([
            'status' => 'success',
            'message' => 'This is a test message'
        ]);
    }

    public function getTechnologies()
    {

        $technologies = Technology::all();

        return response()->json([

            'status' => 'success',
            'techonologies' => $technologies
        ]);

    }
}
