<?php

/**
 * Class PrimeClass
 */
class PrimeClass
{
    /**
     * @param int $primeCount
     * @param int $limit
     * @return array
     */
    public function primeno(int $totalCount = 10, int $noLimit = 100): array
    {
        $primeArr = [];
        for ($i = 1; $i <= $noLimit; $i++) {

            $counter = 0;
            for ($j = 1; $j <= $i; $j++) {
                if ($i % $j == 0) {
                    $counter++;
                }
            }

            if ($counter == 2) {
                $primeArr[] = $i;
            }

            if (count($primeArr) == $totalCount) {
                break;
            }
        }
        return $primeArr;
    }

    /**
     * @param int $totalCount
     * @param int $noLimit
     * @return array
     */
    public function gePrimeProduct(int $totalCount = 10, int $noLimit = 100): array
    {
        $primeNoArr = self::primeno($totalCount, $noLimit);
        $arrCount = count($primeNoArr);

        $primeTableArr = [];
        for ($i = 0; $i < $arrCount; $i++) {
            $productArr = [];
            for ($j = 0; $j < $arrCount; $j++) {
                // new array with multiplication
                $productArr[] = ($primeNoArr[$j] * $primeNoArr[$i]);
            }
            //final array with multiplied result of prime no.s
            $primeTableArr[$primeNoArr[$i]] = $productArr;
        }

        return $primeTableArr;
    }

    /**
     * @param int $totalCount
     * @param int $noLimit
     * @return string
     */
    public function getPrimeTable(int $totalCount = 10, int $noLimit = 100): string
    {
        $primeTableArr = self::gePrimeProduct($totalCount, $noLimit);
        $glue = " | ";
        $break = "\n";

        // construct table structure
        $html = '';
        if (count($primeTableArr) < $totalCount) {
            $html .= "\n Only <" . count($primeTableArr) . "> prime no. exist you are requesting for <" . $totalCount .
                "> !! \n";
            $html .= $break;
        }

        // first row of prime no.s
        $html .= $glue;
        $html .= implode(' ', self::primeno($totalCount, $noLimit));
        $html .= $break;

        // rows with multiplied data
        foreach ($primeTableArr as $no => $key) {
            $html .= $no . $glue . implode(' ', $key);
            $html .= $break;
        }

        return $html;
    }
}

?>