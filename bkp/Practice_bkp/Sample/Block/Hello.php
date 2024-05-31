<?php

namespace Magento\Sample\Block;

use Magento\Framework\View\Element\Template;
use Magento\Sample\Model\ResourceModel\Data\Collection;
use Magento\Sample\Model\ResourceModel\Data\CollectionFactory;

class Hello extends Template
{
    private $collectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setTemplate('Magento_Sample::hello.phtml');
    }

    public function getCollection()
    {
        return $this->collectionFactory->create();
    }
}
