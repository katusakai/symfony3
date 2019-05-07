<?php


namespace App\Service;

use DateTime;

class AgeCalculator
{
    private $birthDate;

    /**
     * AgeCalculator constructor.
     * @param $birthDate
     */
    public function __construct(DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    public function yearsCalculator(){
        $now = new DateTime;
        $diff = $now->diff($this->birthDate);
        $years = $diff->y;

        return $years;
    }


}