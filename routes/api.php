<?php

use Illuminate\Http\Request;
use App\Invalidesa;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/barri/{barri}',function(request $request, $barri){
	$invalids = Invalidesa::Select("invalids")->where('barri','like',"%".$barri."%")->get();
	return response()->json($invalids);
});

Route::get('/invalids/{numero}',function(request $request, $invalids){
	$invalids = Invalidesa::Select("barri")->where('invalids','>',$invalids)->get();
	return response()->json($invalids);
});