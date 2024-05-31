<?php

namespace Magento\Sample\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $setup->getConnection()->insert(
            $setup->getTable('Sample_person'),
            [
                'name' => 'Gnaneswar',
                'email' => 'Gnaneswar@gmail.com'
            ]
        );

        $setup->getConnection()->insert(
            $setup->getTable('Sample_magento'),
            [
                'name' => 'Hemanth',
                'email' => 'Hemanth@gmail.com'
            ]
        );

        $setup->endSetup();
    }
}
