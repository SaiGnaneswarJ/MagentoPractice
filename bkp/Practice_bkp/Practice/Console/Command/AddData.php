<?php

namespace Magento\Practice\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Magento\Practice\Model\PracticeFactory;
use Magento\Framework\Console\Cli;

class AddData extends Command
{
    const INPUT_KEY_NAME = 'name';
    const INPUT_KEY_EMAIL = 'email';
    const INPUT_KEY_TELEPHONE = 'telephone';
    const INPUT_KEY_AGE = 'age';
    const INPUT_KEY_GENDER = 'gender';
    const INPUT_KEY_ADDRESS = 'address';



    private $PracticeFactory;

    public function __construct(PracticeFactory $PracticeFactory)
    {
        $this->PracticeFactory = $PracticeFactory;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('practice:data:add')
            ->addArgument(
                self::INPUT_KEY_NAME,
                InputArgument::REQUIRED,
                'Data Name'
            )->addArgument(
                self::INPUT_KEY_EMAIL,
                InputArgument::REQUIRED,
                'Data Email'
            )->addArgument(
                self::INPUT_KEY_TELEPHONE,
                InputArgument::REQUIRED,
                'Data Telephone'
            )->addArgument(
                self::INPUT_KEY_AGE,
                InputArgument::REQUIRED,
                'Data Age'
            )->addArgument(
                self::INPUT_KEY_GENDER,
                InputArgument::REQUIRED,
                'Data Gender'
            )->addArgument(
                self::INPUT_KEY_ADDRESS,
                InputArgument::REQUIRED,
                'Data Address'
            );

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->PracticeFactory->create();
        $data->setName($input->getArgument(self::INPUT_KEY_NAME));
        $data->setEmail($input->getArgument(self::INPUT_KEY_EMAIL));
        $data->setTelephone($input->getArgument(self::INPUT_KEY_TELEPHONE));
        $data->setAge($input->getArgument(self::INPUT_KEY_AGE));
        $data->setGender($input->getArgument(self::INPUT_KEY_GENDER));
        $data->setAddress($input->getArgument(self::INPUT_KEY_ADDRESS));
        $data->setIsObjectNew(true);
        $data->save();
        return Cli::RETURN_SUCCESS;
    }
}
