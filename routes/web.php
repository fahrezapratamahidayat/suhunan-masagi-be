<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/storage/{path}', function (Request $request, $path) {
    $privateFilePath = storage_path('app/private/' . $path);
    
    if (file_exists($privateFilePath)) {
        return response()->file($privateFilePath, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
        ]);
    }
    
    $publicFilePath = storage_path('app/public/' . $path);
    
    if (file_exists($publicFilePath)) {
        return response()->file($publicFilePath, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization',
        ]);
    }
    
    abort(404, 'File not found');
})->where('path', '.*')->middleware('web');
