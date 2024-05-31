<?php

namespace Magento\Sample\Plugin;

use Magento\Sample\Console\Command\AddData;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Logger
{   
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @var InputInterface
     */
    private $input;

    public function beforeRun(AddData $command, InputInterface $input, OutputInterface $output)
    {
        $this->output = $output;
        $this->input = $input;
        $output->writeln('beforeExecute');
    }

    public function aroundRun(AddData $command, \Closure $proceed, InputInterface $input, OutputInterface $output)
    {
        $output->writeln('aroundExecute before call');
        $result = $proceed($input, $output);
        $output->writeln('aroundExecute after call');

        return $result;
    }

    public function afterRun(AddData $command, $result)
    {
        // Access the command data using $this->input
        $name = $this->input->getArgument(AddData::INPUT_KEY_NAME);
        $email = $this->input->getArgument(AddData::INPUT_KEY_EMAIL);

        $this->output->writeln('afterExecute');
        $this->output->writeln('Name: ' . $name);
        $this->output->writeln('Email: ' . $email);

        return $result;
    }
}
