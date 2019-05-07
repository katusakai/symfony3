<?php


namespace App\Command;


use App\Service\AdultChecker;
use App\Service\AgeCalculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use DateTime;
use Symfony\Component\Console\Style\SymfonyStyle;

class AgeCalculatorCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName("app:age:calculator")
            ->setDescription("Calculates inputted age and tells if person is adult")
            ->setHelp('Enter birth date YYYY-MM-DD and parameter --adult to show if person is adult')
            ->addArgument('date', InputArgument::REQUIRED, 'Birthday of person')
            ->addOption("adult", $shortcut = null, $mode = null, $description = 'Option shows if person is adult', $default = null )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $born_date = $input->getArgument('date');
        $years = new AgeCalculator(new DateTime($born_date));
        $io = new SymfonyStyle($input, $output);
        $adult_checker = new AdultChecker($years);

        $io->note('I am ' . $years->yearsCalculator() . " ". $adult_checker->getYearPlural() . " old");

        if($input->getOption('adult'))
        {
            $text = "Am I an adult?   -----   " . $adult_checker->getAnswerWord() . " !!!";

            if($adult_checker->getAnswerWord() === "YES"){
                $io->success($text);
            } else {
                $io->warning($text);
            }

        }
    }
}