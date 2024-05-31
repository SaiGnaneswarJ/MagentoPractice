<?php
namespace Magento\QuickOrder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Checkout\Model\Session as CheckoutSession;

class AddProductToSession extends Action
{
    protected $resultFactory;
    protected $checkoutSession;

    public function __construct(
        Context $context,
        ResultFactory $resultFactory,
        CheckoutSession $checkoutSession
    ) {
        $this->resultFactory = $resultFactory;
        $this->checkoutSession = $checkoutSession;
        parent::__construct($context);
    }

    public function execute()
    {
        $productId = $this->getRequest()->getParam('id');
        $productName = $this->getRequest()->getParam('name');
        $productQuantity = $this->getRequest()->getParam('quantity');
        $productSku = $this->getRequest()->getParam('sku');
        $productPrice = $this->getRequest()->getParam('price');

        $productData = [
            'id' => $productId,
            'name' => $productName,
            'quantity' => $productQuantity,
            'sku' => $productSku,
            'price' => $productPrice
        ];

        $productsInSession = $this->checkoutSession->getProductsInSession() ?: [];
        $productsInSession[$productId] = $productData;
        $this->checkoutSession->setProductsInSession($productsInSession);

        // print_r($this->checkoutSession->getProductsInSession());
        // exit;
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        return $resultPage;
    }
}
