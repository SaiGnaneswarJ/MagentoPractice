<?php

namespace Magento\Sample\Model;

use Magento\Framework\Model\AbstractModel;

class Data extends AbstractModel
{
    protected function _construct()
    {
        $this->_init(\Magento\Sample\Model\ResourceModel\Data::class);
    }
}
