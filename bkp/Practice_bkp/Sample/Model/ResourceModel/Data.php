<?php

namespace Magento\Sample\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Data extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('Sample_person','id');
    }
}
