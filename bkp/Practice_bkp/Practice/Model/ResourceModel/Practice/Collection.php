<?php
namespace Magento\Practice\Model\ResourceModel\Practice;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected function _construct()
    {
        $this->_init('Magento\Practice\Model\Practice', 'Magento\Practice\Model\ResourceModel\Practice');
    }
}