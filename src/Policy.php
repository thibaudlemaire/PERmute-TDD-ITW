<?php

namespace App;

class Policy
{
    private $age;
    private $vehicleType;
    private $accidentHistory;

    public function __construct($age, $vehicleType, $accidentHistory)
    {
        $this->age = $age;
        $this->vehicleType = $vehicleType;
        $this->accidentHistory = $accidentHistory;
    }

    public function calculatePremium()
    {
        return true;
    }
}