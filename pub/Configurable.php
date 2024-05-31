<?php

use Magento\Framework\App\Bootstrap;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

require __DIR__ . '/../app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);

$objectManager = $bootstrap->getObjectManager();
$appState = $objectManager->get(\Magento\Framework\App\State::class);
$appState->setAreaCode('adminhtml');

$productRepository = $objectManager->create(\Magento\Catalog\Api\ProductRepositoryInterface::class);
$productFactory = $objectManager->create(\Magento\Catalog\Api\Data\ProductInterfaceFactory::class);
$productAttributeRepository = $objectManager->create(\Magento\Catalog\Api\ProductAttributeRepositoryInterface::class);
$attributeSetId = 4;

try {
    // Create simple product
    $simpleProduct1 = $productFactory->create();
    $simpleProduct1->setSku('KB-0231');
    $simpleProduct1->setName('keyBoard');
    $simpleProduct1->setPrice(10.00);
    $simpleProduct1->setAttributeSetId($attributeSetId);
    $simpleProduct1->setTypeId(\Magento\Catalog\Model\Product\Type::TYPE_SIMPLE);
    $simpleProduct1->setVisibility(\Magento\Catalog\Model\Product\Visibility::VISIBILITY_NOT_VISIBLE);
    $simpleProduct1->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
    $simpleProduct1->setStockData([
        'use_config_manage_stock' => 1,
        'qty' => 100,
        'is_qty_decimal' => 0,
        'is_in_stock' => 1,
    ]);
    $simpleProduct1 = $productRepository->save($simpleProduct1);

    // Create configurable product
    $configurableProduct = $productFactory->create();
    $configurableProduct->setSku('KB-001');
    $configurableProduct->setName('KeyBoard');
    $configurableProduct->setPrice(20.00);
    $configurableProduct->setAttributeSetId($attributeSetId);
    $configurableProduct->setTypeId(\Magento\ConfigurableProduct\Model\Product\Type\Configurable::TYPE_CODE);
    $configurableProduct->setVisibility(\Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH);
    $configurableProduct->setStatus(\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
    $configurableProduct->setStockData([
        'use_config_manage_stock' => 1,
        'qty' => 0,
        'is_qty_decimal' => 0,
        'is_in_stock' => 1,
    ]);
    $configurableProduct = $productRepository->save($configurableProduct);


    $associatedProducts = [
        [
            'id' => $simpleProduct1->getId(),
            'label' => 'Color',
            'attribute' => 'color',
            'value_index' => 1
        ]
    ];

    $attributeOptions = [];
    foreach ($associatedProducts as $productData) {
        $option = $objectManager->create(\Magento\ConfigurableProduct\Api\Data\OptionInterface::class);
        $option->setLabel($productData['label']);
        $option->setAttributeId($productAttributeRepository->get($productData['attribute'])->getAttributeId());
        $optionValue = $objectManager->create(\Magento\ConfigurableProduct\Api\Data\OptionValueInterface::class);
        $optionValue->setValueIndex($productData['value_index']);
        $option->setValues([$optionValue]);
        $attributeOptions[] = $option;
    }

    $extensionAttributes = $configurableProduct->getExtensionAttributes();
    if (!$extensionAttributes) {
        $extensionAttributes = $objectManager->create(\Magento\Catalog\Api\Data\ProductExtension::class);
    }

    $extensionAttributes->setConfigurableProductOptions($attributeOptions);
    $extensionAttributes->setConfigurableProductLinks([$simpleProduct1->getId()]);
    $configurableProduct->setExtensionAttributes($extensionAttributes);

    $configurableProduct = $productRepository->save($configurableProduct);

    echo "Configurable product with associated simple products created successfully!";

} catch (LocalizedException $e) {
    echo "Error: " . $e->getMessage();
} catch (NoSuchEntityException $e) {
    echo "Error: " . $e->getMessage();
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>
