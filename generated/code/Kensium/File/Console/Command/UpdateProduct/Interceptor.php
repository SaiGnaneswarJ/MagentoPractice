<?php
namespace Kensium\File\Console\Command\UpdateProduct;

/**
 * Interceptor class for @see \Kensium\File\Console\Command\UpdateProduct
 */
class Interceptor extends \Kensium\File\Console\Command\UpdateProduct implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Framework\App\State $state)
    {
        $this->___init();
        parent::__construct($productRepository, $storeManager, $state);
    }

    /**
     * {@inheritdoc}
     */
    public function run(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'run');
        return $pluginInfo ? $this->___callPlugins('run', func_get_args(), $pluginInfo) : parent::run($input, $output);
    }
}
