<?php
namespace Magento\QuickOrder\Controller\Index\Search;

/**
 * Interceptor class for @see \Magento\QuickOrder\Controller\Index\Search
 */
class Interceptor extends \Magento\QuickOrder\Controller\Index\Search implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Catalog\Model\ProductFactory $productFactory, \Magento\Framework\Controller\Result\JsonFactory $jsonResultFactory, \Magento\CatalogInventory\Api\StockStateInterface $stockState)
    {
        $this->___init();
        parent::__construct($context, $productFactory, $jsonResultFactory, $stockState);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }
}
