<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Models\SaleRequest;
use App\Models\Sale;
use App\Models\SuccessResponse;
use App\Models\FailResponse;
use App\Providers\PayMeProvider;
use App\Models\ResponseCreator;
use App\DAL\SaleDBConnector;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('form', ["code" => null]);
});

Route::post('/create', function () {
    $saleRequest = new SaleRequest(request("name"), request("currency"), request("price"));
    $paymeProvider = new PayMeProvider();
    $response = $paymeProvider->createRequest($saleRequest);
    $responseObject = new ResponseCreator($response);
    if ($responseObject->statusCode == "0"){
        $saleConnector = new SaleDBConnector($responseObject, $saleRequest);
        return view('form', ["data" => $responseObject->saleUrl, "code" => $responseObject->statusCode]);
    }
    else {
        return view('form', ["data" => $responseObject->statusErrorDetails, "code" => $responseObject->statusCode]);
    }
});
