<?php
namespace Kensium\File\Controller\Adminhtml\Index\MassDelete;

/**
 * Interceptor class for @see \Kensium\File\Controller\Adminhtml\Index\MassDelete
 */
class Interceptor extends \Kensium\File\Controller\Adminhtml\Index\MassDelete implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Kensium\File\Model\ResourceModel\File\CollectionFactory $collectionFactory)
    {
        $this->___init();
        parent::__construct($context, $collectionFactory);
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
