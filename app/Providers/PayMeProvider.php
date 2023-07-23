<?php

namespace App\Providers;
use Illuminate\Support\Facades\Http;

class PayMeProvider {

    private $staticApiUrl = "https://sandbox.payme.io/api/generate-sale";
    private $staticSellerId = "MPL14985-68544Z1G-SPV5WK2K-0WJWHC7N";
    private $staticInstallments = "1";
    private $staticLang = "en";

    public function createRequest($request){
        $priceInCents = $request->getPriceInCents();
        $currency = $request->getCUrrency();
        $productName = $request->getName();
        // used withoutVerifying, since laravel requires ssl certs
        $response = Http::withoutVerifying()
        ->withOptions(["verify"=>false])
        ->post($this->staticApiUrl, [
            "seller_payme_id" => $this->staticSellerId,
            "sale_price" => $priceInCents,
            "currency" => $currency,
            "product_name" => $productName,
            "installments" => $this->staticInstallments,
            "language" => $this->staticLang
        ]);
        return json_decode($response);
    }

}