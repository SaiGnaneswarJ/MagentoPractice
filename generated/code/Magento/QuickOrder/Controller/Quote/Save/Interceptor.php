<?php
namespace Magento\QuickOrder\Controller\Quote\Save;

/**
 * Interceptor class for @see \Magento\QuickOrder\Controller\Quote\Save
 */
class Interceptor extends \Magento\QuickOrder\Controller\Quote\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Quote\Model\QuoteIdMaskFactory $quoteIdMaskFactory, \Magento\Quote\Api\CartRepositoryInterface $quoteRepository)
    {
        $this->___init();
        parent::__construct($context, $quoteIdMaskFactory, $quoteRepository);
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
