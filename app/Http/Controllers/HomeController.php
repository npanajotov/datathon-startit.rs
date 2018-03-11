<?php

namespace App\Http\Controllers;


use App\Betting;
use App\Schools;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {

        $data = Betting::create($request->all());
        return response()->json(['message' => 'Success!', 'status' => $data]);
    }

    public function schools(Request $request)
    {
        $data = Schools::create($request->all());
        return response()->json(['message' => 'Success!', 'status' => $data]);
    }
}