<?php

namespace Magento\Sample\Api;

/**
 * Interface ItemRepositoryInterface
 * @api
 */
interface ItemRepositoryInterface
{
    /**
     * Get list of items.
     *
     * @return \Magento\Sample\Api\Data\ItemInterface[]
     */
    public function getList();
}
