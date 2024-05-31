<?php
namespace Kensium\File\Controller\Index\SaveCategory;

/**
 * Interceptor class for @see \Kensium\File\Controller\Index\SaveCategory
 */
class Interceptor extends \Kensium\File\Controller\Index\SaveCategory implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Framework\Controller\Result\JsonFactory $jsonFactory, \Magento\Catalog\Model\ProductFactory $productFactory, \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository)
    {
        $this->___init();
        parent::__construct($context, $jsonFactory, $productFactory, $categoryRepository);
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
