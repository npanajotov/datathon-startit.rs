<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/near-one', function (\App\Services\HaversineService $haversineService) {
    $data = collect([]);
    $schools = \App\Schools::all();
    $bettings = \App\Betting::all();
    if (Illuminate\Support\Facades\Cache::get('near_one')) {
        $data = Illuminate\Support\Facades\Cache::get('near_one');
        return response()->json(collect($data)->unique('school_id')->filter(function($item) {
            return $item['dist'] < 20000;
        }));
    }
    $items = [];
    foreach ($schools as $school) {
        $item[$school->id] = PHP_INT_MAX;
        foreach ($bettings as $betting) {
            $dist = $haversineService->getDistance($school->lat, $school->lng, $betting->lat, $betting->lng);
            if ($dist < $item[$school->id]) {
                $item[$school->id] = $dist;
                $items[$school->id] = [
                    'school_id' => $school->id,
                    'school' => $school->name,
                    'betting' => $betting->name,
                    'dist' => $dist
                ];
            }
        }
    }
    Illuminate\Support\Facades\Cache::put('near_one', $items, 5);
    return response()->json(collect($items)->values()->filter(function($item) {
        return $item['dist'] < 20000;
    })->unique('school_id')->sortByDesc('dist'));

});

Route::get('diagram', function(){
   return view('diagramcic');
});
Route::get('histogram', function(){
   return view('histrogram');
});
Route::get('/check', function(\App\Services\HaversineService $haversineService) {
    $data = collect([]);
    $distance = request()->input('distance', 200);
    $schools = \App\Schools::all();
    $bettings = \App\Betting::all();
    if (Illuminate\Support\Facades\Cache::get('check_' . $distance)) {
        $data = Illuminate\Support\Facades\Cache::get('check_' . $distance);
        $data = $data->unique('school_address')->values();
        return response()->json($data);
    }
    foreach ($schools as $school) {
        foreach ($bettings as $betting) {
            $dist = $haversineService->getDistance($school->lat, $school->lng, $betting->lat, $betting->lng);
            if ($dist <= $distance) {
                $data->push([
                    'school_id' => $school->id,
                    'betting_id' => $betting->id,
                    'distance' => $dist,
                    'school' => $school->name,
                    'betting' => $betting->name,
                    'school_address' => $school->address,
                    'betting_address' => $betting->address,
                    'school_lat' => [
                        'lat' => $school->lat,
                        'lng' => $school->lng
                    ],
                    'betting_lat' => [
                        'lat' => $betting->lat,
                        'lng' => $betting->lng
                    ]
                ]);
            }
        }
    }
    Illuminate\Support\Facades\Cache::put('check_' . $distance, $data, 50);
    $data = $data->unique('school_address')->values();
    return response()->json($data);
});