<?php

namespace Magento\Sample\Model;

use Magento\Sample\Api\ItemRepositoryInterface;
use Magento\Sample\Model\ResourceModel\Data\CollectionFactory;

/**
 * Class ItemRepository
 */
class ItemRepository implements ItemRepositoryInterface
{
    private $collectionFactory;

    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        return $this->collectionFactory->create()->getItems();
    }
}
