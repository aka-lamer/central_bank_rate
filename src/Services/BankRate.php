<?php

namespace CentralBunk\Rate\Services;

use CentralBunk\Rate\Services\BankRate\Interfaces\RateDataInterface;
use CentralBunk\Rate\Services\BankRate\Managers\JsonFileDataManager;
use CentralBunk\Rate\Services\BankRate\Managers\JsonSiteDataManager;
use \GuzzleHttp\Client;


class BankRate implements RateDataInterface{

    protected $rateClass;

    protected $collect;

    public function __construct() {
        $this->toSite();
    }

/*     public function toFile(){
        $this->dataRate = new JsonFileDataManager();

        return $this;
    } */

    public function toSite(){
        $this->rateClass = new JsonSiteDataManager();
        $this->collect = $this->rateClass->getRateData();
        return $this;
    }

    public function getRateData()
    {
        return $this->collect;
    }

    public function getCurrencyValue($latinTitle)
    {
        $valueArray = $this->collect->only($latinTitle)->map(function($item, $key){
            return $item->Value;
        });

        $rezValue = round($valueArray[$latinTitle], 2);

        return $rezValue;
    }

}