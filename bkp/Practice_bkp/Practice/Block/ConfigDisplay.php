<?php

namespace Magento\Practice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Practice\Helper\Data;

class ConfigDisplay extends Template
{
    protected $helperData;

    public function __construct(Context $context,Data $helperData) {
        parent::__construct($context);
        $this->helperData = $helperData;
    }

    public function getHelperData()
    {
        return $this->helperData;
    }
}
