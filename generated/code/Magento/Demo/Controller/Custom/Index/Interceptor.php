<?php
namespace Magento\Demo\Controller\Custom\Index;

/**
 * Interceptor class for @see \Magento\Demo\Controller\Custom\Index
 */
class Interceptor extends \Magento\Demo\Controller\Custom\Index implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\UrlRewrite\Model\UrlRewriteFactory $urlRewriteFactory, \Magento\Cms\Model\PageFactory $pageFactory, \Magento\Framework\Message\ManagerInterface $messageManager, \Magento\Framework\View\Result\PageFactory $resultPageFactory)
    {
        $this->___init();
        parent::__construct($context, $urlRewriteFactory, $pageFactory, $messageManager, $resultPageFactory);
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
