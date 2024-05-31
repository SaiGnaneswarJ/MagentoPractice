<?php
namespace Kensium\File\Console\Command\UpdateStock;

/**
 * Interceptor class for @see \Kensium\File\Console\Command\UpdateStock
 */
class Interceptor extends \Kensium\File\Console\Command\UpdateStock implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\App\State $state, \Magento\Catalog\Api\ProductRepositoryInterface $productRepository, \Magento\CatalogInventory\Api\StockRegistryInterface $stockRegistry)
    {
        $this->___init();
        parent::__construct($state, $productRepository, $stockRegistry);
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
