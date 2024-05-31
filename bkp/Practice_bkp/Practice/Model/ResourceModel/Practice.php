<?php
namespace Magento\Practice\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
class Practice extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('form_data', 'id');
    }
}