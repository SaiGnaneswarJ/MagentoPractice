<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Magento\Framework\App\Bootstrap;
use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Catalog\Model\Product\Option;

require __DIR__ . '/../app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();

$state = $objectManager->get(\Magento\Framework\App\State::class);
$state->setAreaCode('frontend');

try {
    $product = $objectManager->create(ProductInterface::class);

    $product
        ->setSku('LCB-001')
        ->setName('Category Book')
        ->setAttributeSetId(4)
        ->setStatus(1)
        ->setWeight(10)
        ->setVisibility(4)
        ->setTaxClassId(0)
        ->setTypeId('downloadable')
        ->setPrice(15)
        ->setStockData([
            'use_config_manage_stock' => 0,
            'manage_stock' => 1,
            'is_in_stock' => 1,
            'qty' => 50
        ]);

    $product->save();

    $options = [
        [
            "sort_order" => 1,
            "title" => "Option",
            "price_type" => "fixed",
            "price" => "10",
            "type" => "field",
            "is_require" => 0
        ]
    ];

    $product->setHasOptions(true);
    $product->setCanSaveCustomOptions(true);

    foreach ($options as $arrayOption) {
        $option = $objectManager->create(Option::class)
            ->setProductId($product->getId())
            ->setStoreId($product->getStoreId())
            ->addData($arrayOption);
        $option->save();
        $product->addOption($option);
    }

    echo 'Downloadable product created successfully'.'<br>';
} catch (\Exception $e) {
    $objectManager->get(\Psr\Log\LoggerInterface::class)->info($e->getMessage());
    echo $e->getMessage();
}
