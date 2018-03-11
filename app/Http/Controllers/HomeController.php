<?php

namespace App\Http\Controllers;


use App\Betting;
use Illuminate\Http\Request;

class HomeController
{
    public function index(Request $request)
    {

        $data = Betting::create($request->all());
        return response()->json(['message' => 'Success!', 'status' => $data]);
    }
}