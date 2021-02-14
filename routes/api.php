<?php

use App\Http\Controllers\OperadoraController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::apiResource('/operadoras', 'App\Http\Controllers\OperadoraController');
