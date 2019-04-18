<?php
include_once 'PrimeClass.php';

use PHPUnit\Framework\TestCase;

/**
 * Class PrimeTest
 */
class PrimeTest extends TestCase
{
    /**
     * @return PrimeClass
     */
    public function getPrimeClass()
    {
        return new PrimeClass();
    }

    /**
     * @return string
     * @throws Exception
     */
    public function testPrimeNo()
    {
        $prime = self::getPrimeClass();
        $primeNo = $prime->primeno(5, 100);
        $noStr = implode(',', $primeNo);
        $output = '2,3,5,7,11';
        $this->assertNotEmpty($primeNo);
        $this->assertEquals($output, $noStr);

        return $noStr;
    }

    /**
     * @return array
     * @throws Exception
     */
    public function testPrimeProduct()
    {
        $prime = self::getPrimeClass();
        $primeProduct = $prime->gePrimeProduct(5, 100);

        $expected[2] = [4, 6, 10, 14, 22];
        $expected[3] = [6, 9, 15, 21, 33];
        $expected[5] = [10, 15, 25, 35, 55];
        $expected[7] = [14, 21, 35, 49, 77];
        $expected[11] = [22, 33, 55, 77, 121];

        $this->assertNotEmpty($primeProduct);
        $this->assertEquals($expected, $primeProduct);

        return $primeProduct;
    }
}