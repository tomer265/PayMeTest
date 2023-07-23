<?php

namespace App\Models;


class ResponseCreator {

    public $statusCode;
    public $saleUrl;
    public $statusErrorDetails;
    public $transactionId;
    public $paymeSaleCode;

    function __construct($responseObject){
        if ($responseObject->status_code == 0){
            $returnValue = new SuccessResponse($responseObject);
            $this->saleUrl = $returnValue->saleUrl;
            $this->statusCode = $returnValue->statusCode;
            $this->transactionId = $returnValue->transactionId;
            $this->paymeSaleCode = $returnValue->paymeSaleCode;
            return $returnValue;
        }
        else {
            $returnValue = new FailResponse($responseObject);
            $this->statusErrorDetails = $returnValue->statusErrorDetails;
            $this->statusCode = $returnValue->statusCode;
            return $returnValue;
        }
    }
}

class SuccessResponse{

    public $statusCode;
    public $saleUrl;
    public $paymeSaleId;
    public $paymeSaleCode;
    public $price;
    public $transactionId;
    public $currency;

    function __construct($response){
        $this->statusCode = $response->status_code;
        $this->saleUrl = $response->sale_url;
        $this->paymeSaleId = $response->payme_sale_id;
        $this->paymeSaleCode = $response->payme_sale_code;
        $this->price = $response->price;
        $this->transactionId = $response->transaction_id;
        $this->currency = $response->currency;
    }
}

class FailResponse {

    public $statusCode;
    public $statusErrorDetails;
    public $statusAdditionalInfo;
    public $statusErrorCode;

    function __construct($response){
        $this->statusCode = $response->status_code;
        $this->statusErrorDetails = $response->status_error_details;
        $this->statusAdditionalInfo = $response->status_additional_info;
        $this->statusErrorCode = $response->status_error_code;
    }
}