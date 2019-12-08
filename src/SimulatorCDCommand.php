<?php

namespace Simulator;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Question\Question;

class SimulatorCDCommand extends Command
{
    protected function configure()
    {
        $this->setName('simulator:cd');
        $this->setDescription('Run command to simulate changing directories in filesystem.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Insert command to change dir like: /a/b/c.</info>');

        $path = new Path('/a/b/c/d');
        $helper = $this->getHelper('question');

        $question = new Question( $path->currentPath . '$ cd ');
        $question->setValidator(function ($answer) {
            if (!preg_match('#^((\.\.?/|[a-zA-Z_/])*)|[\.\.]$#', $answer)) {
                throw new \RuntimeException(
                    'Please insert the right format'
                );
            }
            return $answer;
        });

        $answer = $helper->ask($input, $output, $question);

        $path->cd($answer);

        $output->writeln('<info>You changed path and now you are in: </info>' . $path->currentPath);
        return 1;
    }
}