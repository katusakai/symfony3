<?php


namespace App\Service;


class AdultChecker
{
    private $answer_word;
    private $background_color;
    private $ageCalculator;
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
            $this->background_color = "fg=black;bg=green";
        } else {
            $this->answer_word = "NO";
            $this->background_color = "fg=white;bg=red";
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

    /**
     * @return mixed
     */
    public function getBackgroundColor()
    {
        return $this->background_color;
    }


}