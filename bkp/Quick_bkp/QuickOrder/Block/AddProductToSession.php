<?php
namespace Magento\QuickOrder\Block;

use Magento\Checkout\Model\Session;

class AddProductToSession extends \Magento\Framework\View\Element\Template
{
    protected $checkoutSession;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        Session $checkoutSession,
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
