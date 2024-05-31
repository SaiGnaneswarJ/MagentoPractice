<?php
namespace Kensium\File\Controller\Adminhtml\Index\Save;

/**
 * Interceptor class for @see \Kensium\File\Controller\Adminhtml\Index\Save
 */
class Interceptor extends \Kensium\File\Controller\Adminhtml\Index\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Kensium\File\Model\FileFactory $fileFactory, \Magento\Framework\Data\Form\FormKey\Validator $formKeyValidator, \Magento\Framework\Controller\ResultFactory $resultFactory)
    {
        $this->___init();
        parent::__construct($context, $fileFactory, $formKeyValidator, $resultFactory);
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
