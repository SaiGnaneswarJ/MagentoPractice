<?php

use Magento\Framework\App\Bootstrap;

require __DIR__ . '/../app/bootstrap.php';

$params = $_SERVER;
$bootstrap = Bootstrap::create(BP, $params);
$objectManager = $bootstrap->getObjectManager();
$state = $objectManager->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');
$product = $objectManager->create('Magento\Catalog\Model\Product');
$urlRewrite = $objectManager->create('Magento\UrlRewrite\Model\ResourceModel\UrlRewriteCollection');

try {
    $productName = 'STORE KIT';
    $productSku = 'SK-0231';
    $baseUrlKey = strtolower(str_replace(' ', '-', $productName));
    $urlKey = $baseUrlKey;


    $increment = 1;
    while ($urlRewrite->addFieldToFilter('request_path', $urlKey . '.html')->getSize() > 0) {
        $urlKey = $baseUrlKey . '-' . $increment;
        $increment++;
        $urlRewrite->clear();
    }

    $product->setName($productName);
    $product->setTypeId('bundle');
    $product->setAttributeSetId(11);
    $product->setSku($productSku);
    $product->setWebsiteIds([1]);
    $product->setVisibility(4);
    $product->setPrice(75);
    $product->setUrlKey($urlKey);
    $product->setPriceType(\Magento\Bundle\Model\Product\Price::PRICE_TYPE_FIXED);
    $product->setPriceView(0);
    $product->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
    $product->setStockData(['use_config_manage_stock' => 1, 'is_in_stock' => 1, 'qty' => 100]);
    $productName->setShipmentType(1);
    $product->save();

    $product = $objectManager->create('Magento\Catalog\Model\Product')->load($product->getId());

    $bundleOptionFactory = $objectManager->create('Magento\Bundle\Model\OptionFactory');
    $bundleSelectionFactory = $objectManager->create('Magento\Bundle\Model\SelectionFactory');
    $optionSave = $objectManager->create('Magento\Bundle\Model\ResourceModel\Option');

    $options = [
        [
            'title' => 'Store bag 1',
            'default_title' => 'Store bag 1',
            'type' => 'select',
            'required' => 1,
            'position' => 0,
            'sku' => $product->getSku(),
            'parent_id' => $product->getId(),
        ],
        [
            'title' => 'Store bag 2',
            'default_title' => 'Store bag 2',
            'type' => 'select',
            'required' => 1,
            'position' => 1,
            'sku' => $product->getSku(),
            'parent_id' => $product->getId(),
        ]
    ];

    $selections = [
        0 => [
            ['product_id' => 2, 'selection_qty' => 1, 'selection_can_change_qty' => 1]
        ],
        1 => [
            ['product_id' => 14, 'selection_qty' => 1, 'selection_can_change_qty' => 1]
        ]
    ];

    foreach ($options as $index => $optionData) {
        $option = $bundleOptionFactory->create();
        $option->setData($optionData);
        $option->setStoreId(0);

        $option->save();

        $optionSelections = $selections[$index];
        foreach ($optionSelections as $selectionData) {
            $selection = $bundleSelectionFactory->create();
            $selection->addData($selectionData);
            $selection->setOptionId($option->getId());
            $selection->setParentProductId($product->getId());
            $selection->setProductId($selectionData['product_id']);
            $selection->save();
        }
    }

    $product->save();

    if ($product->getId()) {
        echo "Bundle Product Created Successfully";
    }
} catch (\Exception $e) {
    echo $e->getMessage();
}
