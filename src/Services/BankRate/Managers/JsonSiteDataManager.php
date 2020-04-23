<?php

namespace CentralBunk\Rate\Services\BankRate\Managers;

use GuzzleHttp\Client;

class JsonSiteDataManager extends AbstractManager{

    const URL_BANK_JSON = 'https://www.cbr-xml-daily.ru/daily_json.js';

    protected function getDataFromResource(): object
    {
        $guzzleClass = new Client();
        $guzzle = $guzzleClass->get(self::URL_BANK_JSON);
        $string = $guzzle->getBody()->getContents();

        return json_decode($string);
    }

    public function getRateData(){
        $dataArray = $this->getDataFromResource();
        $collect = collect($dataArray->Valute);
        return $collect;
    }
}