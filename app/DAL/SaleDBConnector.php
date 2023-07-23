<?php

namespace App\DAL;
use App\Models\Sale;

class SaleDBConnector {
    function __construct($response, $request){
        $sale = new Sale();
        $sale->sale_number = $response->paymeSaleCode;
        $sale->description = $request->getName();
        $sale->amount = $request->getPriceInCents();
        $sale->currency = $request->getCurrency();
        $sale->payment_link = $response->saleUrl;
        $sale->save();
    }
}