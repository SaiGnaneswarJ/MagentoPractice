<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Magento\Framework\App\Bootstrap;

require __DIR__ . '/../app/bootstrap.php';

$bootstrap = Bootstrap::create(BP, $_SERVER);
$objectManager = $bootstrap->getObjectManager();
$state = $objectManager->get(Magento\Framework\App\State::class);
$state->setAreaCode('adminhtml');

$orderFactory = $objectManager->get(\Magento\Sales\Model\OrderFactory::class);
$convertOrder = $objectManager->get(\Magento\Sales\Model\Convert\Order::class);
$shipmentNotifier = $objectManager->get(\Magento\Shipping\Model\ShipmentNotifier::class);

$orderId = 34;

try {


    $order = $orderFactory->create()->load($orderId);

    echo "Order Information: ";
    print_r($order);

    if (!$order->canShip()) {
        throw new \Magento\Framework\Exception\LocalizedException(
            __("You can't create the Shipment of this order.")
        );
    }

    $orderShipment = $convertOrder->toShipment($order);

    foreach ($order->getAllItems() as $orderItem) {

        if (!$orderItem->getQtyToShip() || $orderItem->getIsVirtual()) {
            continue;
        }

        $qty = $orderItem->getQtyToShip();
        $shipmentItem = $convertOrder->itemToShipmentItem($orderItem)->setQty($qty);
        $orderShipment->addItem($shipmentItem);
    }

    $orderShipment->register();
    $orderShipment->getOrder()->setIsInProcess(true);


    $orderShipment->save();
    $orderShipment->getOrder()->save();


    $shipmentNotifier->notify($orderShipment);
} catch (\Exception $e) {
    // Handle any exceptions
    echo "Error: " . $e->getMessage();
}

?>
