<?php
namespace Kensium\File\Controller\Index\CreateInvoice;

/**
 * Interceptor class for @see \Kensium\File\Controller\Index\CreateInvoice
 */
class Interceptor extends \Kensium\File\Controller\Index\CreateInvoice implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\Action\Context $context, \Magento\Sales\Api\OrderRepositoryInterface $orderRepository, \Magento\Sales\Model\Service\InvoiceService $invoiceService, \Magento\Sales\Model\Order\Email\Sender\InvoiceSender $invoiceSender, \Magento\Framework\DB\Transaction $transaction, \Kensium\File\Logger\Logger $logger)
    {
        $this->___init();
        parent::__construct($context, $orderRepository, $invoiceService, $invoiceSender, $transaction, $logger);
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
