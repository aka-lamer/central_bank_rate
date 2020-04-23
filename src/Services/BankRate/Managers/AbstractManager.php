<?php

namespace CentralBunk\Rate\Services\BankRate\Managers;

use CentralBunk\Rate\Services\BankRate\Interfaces\RateDataInterface;

abstract class AbstractManager implements RateDataInterface{

    public function getRateData()
    {
        return collect([]);
    }
}