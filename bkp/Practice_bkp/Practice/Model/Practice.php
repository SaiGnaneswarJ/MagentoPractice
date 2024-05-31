<?php
namespace Magento\Practice\Model;

use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Practice extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('Magento\Practice\Model\ResourceModel\Practice');
    }
}