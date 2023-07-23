<?php

namespace App\Models;


    class SaleRequest {
        private $name;
        private $currency;
        private $price;

        function __construct($name, $currency, $price){
            $this->name = $name;
            $this->currency = $currency;
            $this->price = $price;
        }

        public function getPriceInCents(){
            return $this->price * 100;
        }

        public function getCurrency(){
            return $this->currency;
        }

        public function getName(){
            return $this->name;
        }
    }