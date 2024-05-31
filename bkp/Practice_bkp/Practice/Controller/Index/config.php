<?php

namespace Magento\Practice\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Config extends Action
{

    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
