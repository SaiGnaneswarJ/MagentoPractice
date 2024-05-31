<?php

namespace Magento\Sample\Cron;

use Magento\Sample\Model\DataFactory;
use Magento\Sample\Model\Config;

class AddData
{
    private $dataFactory;

    private $config;

    public function __construct(DataFactory $dataFactory,Config $config)
    {
        $this->dataFactory = $dataFactory;
        $this->config = $config;

    }

    public function execute()
    {
        if($this->config->isEnabled())
        {
            $this->dataFactory->create()
                ->setName('Yeswanth')
                ->setEmail('Yeswanth@gmail.com')
                ->save();
        }


    }
}

