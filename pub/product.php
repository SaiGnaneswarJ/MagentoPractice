<?php
use Magento\Framework\App\Bootstrap;
use Magento\Customer\Api\CustomerRepositoryInterface;

require __DIR__ . '/../app/bootstrap.php';

$params = $_SERVER;
$bootstrap = Bootstrap::create(BP, $params);
$obj = $bootstrap->getObjectManager();

$state = $obj->get('Magento\Framework\App\State');
$state->setAreaCode('frontend');

$customerId = 10;
$customerRepository = $obj->get(CustomerRepositoryInterface::class);

try {
    $customer = $customerRepository->getById($customerId);

    // Display customer data
    echo '<pre>';
    echo 'Customer ID: ' . $customer->getId() . PHP_EOL;
    echo 'First Name: ' . $customer->getFirstname() . PHP_EOL;
    echo 'Last Name: ' . $customer->getLastname() . PHP_EOL;
    echo 'Email: ' . $customer->getEmail() . PHP_EOL;
    echo 'Created At: ' . $customer->getCreatedAt() . PHP_EOL;
    echo '</pre>';
} catch (\Magento\Framework\Exception\NoSuchEntityException $e) {
    echo "Customer with ID $customerId does not exist.";
} catch (\Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}

?>
