<?php
namespace Magento\QuickOrder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Checkout\Model\Cart;
use Magento\Catalog\Api\ProductRepositoryInterface;

/**
 * Class Addtocart
 * @package Magento\QuickOrder\Controller\Index
 */
class AddToCart extends Action
{
    protected $resultJsonFactory;
    protected $cart;
    protected $productRepository;

    /**
     * Addtocart constructor.
     * @param Context $context
     * @param JsonFactory $resultJsonFactory
     * @param Cart $cart
     * @param ProductRepositoryInterface $productRepository
     */
    public function __construct(
        Context $context,
        JsonFactory $resultJsonFactory,
        Cart $cart,
        ProductRepositoryInterface $productRepository
    ) {
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
        $this->cart = $cart;
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        
        $productId = (int)$this->getRequest()->getParam('entity_id');
        $qty = (int)$this->getRequest()->getParam('qty');
        $result = ['success' => false];

        if ($productId && $qty) {
            try {
                $product = $this->productRepository->getById($productId);
                if ($product->getId() && $product->isSaleable()) {
                    $this->cart->addProduct($product, ['qty' => $qty]);
                    $this->cart->save();
                    $result['success'] = true;
                    $result['message'] = __('Product added to cart successfully.');
                } else {
                    $result['message'] = __('Product is not available for purchase.');
                }
            } catch (\Exception $e) {
                $result['message'] = __('Error occurred while adding product to cart.');
            }
        } else {
            $result['message'] = __('Invalid product or quantity.');
        }

        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($result);
    }
}
