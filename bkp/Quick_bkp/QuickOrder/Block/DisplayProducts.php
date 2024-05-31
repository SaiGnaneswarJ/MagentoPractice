<?php

namespace Magento\QuickOrder\Block;

use Magento\Framework\View\Element\Template;
use Magento\Checkout\Model\Session as CheckoutSession;

class DisplayProducts extends Template
{
    protected $checkoutSession;

    public function __construct(
        Template\Context $context,
        CheckoutSession $checkoutSession,
        array $data = []
    ) {
        $this->checkoutSession = $checkoutSession;
        parent::__construct($context, $data);
    }

    public function getProductsInSession()
    {    
        return $this->checkoutSession->getProductsInSession();
    }
}
