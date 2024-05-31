<?php

namespace Magento\Sample\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Sample\Model\DataFactory;
use Magento\Framework\Console\Cli;

class AddData extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_EMAIL = 'email';

    private $dataFactory;

    public function __construct(DataFactory $dataFactory)
    {
        $this->dataFactory = $dataFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('sample:data:add')
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Data Name'
            )->addArgument(
                self::INPUT_KEY_EMAIL,
                InputArgument::REQUIRED,
                'Data Email'
            );

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->dataFactory->create();
        $data->setName($input->getArgument(self::INPUT_KEY_NAME));
        $data->setEmail($input->getArgument(self::INPUT_KEY_EMAIL));
        $data->setIsObjectNew(true);
        $data->save();
        return Cli::RETURN_SUCCESS;
    }
}
