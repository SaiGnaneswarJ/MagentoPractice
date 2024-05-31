<?php

namespace Magento\Sample\Model\ResourceModel\Data;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Sample\Model\Data;
use Magento\Sample\Model\ResourceModel\Data as DataResource;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init(Data::class,DataResource::class);
    }

}
