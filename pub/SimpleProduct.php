<?php

use Magento\Framework\App\Bootstrap;

try {
    require __DIR__ . '/../app/bootstrap.php';
} catch (\Exception $e) {
    echo 'Autoload error: ' . $e->getMessage();
    exit(1);
}

try {
    $bootstrap = Bootstrap::create(BP, $_SERVER);
    $objectManager = $bootstrap->getObjectManager();
    $appState = $objectManager->get('Magento\Framework\App\State');
    $appState->setAreaCode('frontend');

    $product = $objectManager->create('Magento\Catalog\Model\Product');

    $sku = 'MS-001';

    $product->setSku($sku);
    $product->setName('Laptop Mouse');
    $product->setAttributeSetId(4);
    $product->setStatus(1);
    $product->setWeight(1);
    $product->setVisibility(4);
    $product->setWebsiteIds([1]);
    $product->setTaxClassId(0);
    $product->setTypeId('simple');
    $product->setPrice(100);

    $stockData = [
        'use_config_manage_stock' => 0,
        'manage_stock' => 1,
        'is_in_stock' => 1,
        'qty' => 100
    ];
    $product->setStockData($stockData);

    $product->save();

    $categoryIds = [2, 3];
    $categoryLinkManagement = $objectManager->get('Magento\Catalog\Api\CategoryLinkManagementInterface');
    $categoryLinkManagement->assignProductToCategories($sku, $categoryIds);

    echo "$sku Product Created Successfully";
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
