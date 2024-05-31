<?php
namespace Magento\QuickOrder\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Catalog\Model\ProductFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class Search extends Action
{
    protected $productFactory;
    protected $jsonResultFactory;

    public function __construct(
        Context $context,
        ProductFactory $productFactory,
        JsonFactory $jsonResultFactory
    ) {
        parent::__construct($context);
        $this->productFactory = $productFactory;
        $this->jsonResultFactory = $jsonResultFactory;
    }

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
                'image_url' => $this->getImageUrl($product),
                'quantity' => 1 // Assuming quantity is always 1 when displaying product details
            ];
            $responseData[] = $productData;
        }

        $result = $this->jsonResultFactory->create();
        $result->setData(['products' => $responseData]);
        return $result;
    }

    private function getImageUrl($product)
    {
        if ($product->getImage()) {
            return $product->getMediaConfig()->getMediaUrl($product->getImage());
        }
        return null;
    }
}
