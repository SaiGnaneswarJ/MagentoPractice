<?php

namespace Magento\Sample\Api\Data;

/**
 * Interface ItemInterface
 * @api
 */
interface ItemInterface
{
    /**
     * Get item name.
     *
     * @return string
     */
    public function getName();

    /**
     * Get item email.
     *
     * @return string
     */
    public function getEmail();
}
