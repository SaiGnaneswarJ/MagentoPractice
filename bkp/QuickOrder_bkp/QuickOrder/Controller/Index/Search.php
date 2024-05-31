<?php

namespace Magento\QuickOrder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Controller\Result\JsonFactory;

/**
 * Class Search
 * @package Magento\QuickOrder\Controller\Index
 */
class Search extends Action
{
    protected $productFactory;
    protected $jsonResultFactory;

    /**
     * Search constructor.
     * @param Context $context
     * @param ProductFactory $productFactory
     * @param JsonFactory $jsonResultFactory
     */
    public function __construct(
        Context $context,
        ProductFactory $productFactory,
        JsonFactory $jsonResultFactory
    ) {
        parent::__construct($context);
        $this->productFactory = $productFactory;
        $this->jsonResultFactory = $jsonResultFactory;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\Result\Json|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $query = $this->getRequest()->getParam('query');
        $products = $this->productFactory->create()->getCollection()
            ->addAttributeToSelect(['name', 'sku', 'price', 'image'])
            ->addAttributeToFilter([
            ['attribute' => 'name', 'like' => '%' . $query . '%'],
            ['attribute' => 'sku', 'like' => '%' . $query . '%']
        ]);

        $responseData = [];
        foreach ($products as $product) {
            $productData = [
                'entity_id' => $product->getId(),
                'name' => $product->getName(),
                'sku' => $product->getSku(),
                'price' => $product->getPrice(),
                'image_url' => $this->getImageUrl($product)
            ];
            $responseData[] = $productData;
        }

        $result = $this->jsonResultFactory->create();
        $result->setData(['products' => $responseData]);
        return $result;
    }

    /**
     * @param $product
     * @return null
     */
    private function getImageUrl($product)
    {

        if ($product->getImage()) {
            return $product->getMediaConfig()->getMediaUrl($product->getImage());
        }
        return null;
    }
}
