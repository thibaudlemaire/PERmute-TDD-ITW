<?php

require "src/Policy.php";

use PHPUnit\Framework\TestCase;
use App\Policy;
 
class PolicyTest extends TestCase
{
    public function testCalculatePremiumForYoungDriver()
    {
        $policy = new Policy(20, 'car', 0);
        $this->assertEquals($policy->calculatePremium(), true);
    }
}
