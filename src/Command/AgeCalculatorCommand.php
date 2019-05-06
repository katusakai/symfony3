<?php


namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AgeCalculatorCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName("app:age:calculator")
            ->setDescription("Calculates inputted age and tells if person is adult")
            ->setHelp('Enter birth date YYYY-MM-DD and parameter --adult to show if person is adult')
            ->addArgument('date', InputArgument::REQUIRED, 'Birthday of person')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $age = $input->getArgument('date');
        $output->writeln("! [NOTE] I am $age old");
    }
}