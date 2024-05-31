<?php

namespace Magento\Practice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Practice\Model\ResourceModel\Practice\CollectionFactory;

class Showdata extends Template
{

    public $collection;

    public function __construct(Context $context, CollectionFactory $collectionFactory, array $data = [])
    {
        $this->collection = $collectionFactory;
        parent::__construct($context, $data);
    }

    public function getCollection()
    {
        return $this->collection->create();
    }

    public function getDeleteAction()
    {
        return $this->getUrl('practice/index/delete', ['_secure' => true]);
    }

    public function getEditAction()
    {
        return $this->getUrl('practice/index/index', ['_secure' => true]);
    }

}

