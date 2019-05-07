<?php


namespace App\Service;


class AdultChecker
{
    private $ageCalculator;
    private $answer_word;
    private $year_plural;

    /**
     * @return mixed
     */
    public function getYearPlural()
    {
        return $this->year_plural;
    }

    /**
     * AdultChecker constructor.
     * @param $ageCalculator
     */
    public function __construct(AgeCalculator $ageCalculator)
    {
        $this->ageCalculator = $ageCalculator;
        $this->checker();
    }

    private function checker()
    {
        if ($this->ageCalculator->yearsCalculator() > 18){
            $this->answer_word = "YES";
        } else {
            $this->answer_word = "NO";
        }

        if ($this->ageCalculator->yearsCalculator() > 1){
            $this->year_plural = "years";
        } else {
            $this->year_plural = "year";
        }
    }

    /**
     * AdultChecker constructor.
     * @param $word
     */


    /**
     * @return mixed
     */
    public function getAnswerWord()
    {
        return $this->answer_word;
    }


}