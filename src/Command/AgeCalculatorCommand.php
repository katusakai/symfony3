<?php


namespace App\Command;


use App\Service\AdultChecker;
use App\Service\AgeCalculator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use DateTime;

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
        $age = $years->yearsCalculator();

        $adult_checker = new AdultChecker($years);
        $answer = $adult_checker->getAnswerWord();
        $format_answer = $adult_checker->getBackgroundColor();
        $years_plural = $adult_checker->getYearPlural();


        $output->writeln([
            "",
            "<fg=yellow>  ! [NOTE] I am $age $years_plural old</>",
            ""
        ]);

        if($input->getOption('adult'))
        {
            $output->writeln([
                "<$format_answer>  Am I an adult?   ----- $answer  !!</>",
                ""
            ]);
        }
    }
}