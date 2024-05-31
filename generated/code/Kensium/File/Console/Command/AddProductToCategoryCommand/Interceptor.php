<?php
namespace Kensium\File\Console\Command\AddProductToCategoryCommand;

/**
 * Interceptor class for @see \Kensium\File\Console\Command\AddProductToCategoryCommand
 */
class Interceptor extends \Kensium\File\Console\Command\AddProductToCategoryCommand implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Api\CategoryLinkManagementInterface $categoryLinkManagement, \Magento\Catalog\Model\Product $product, \Magento\Framework\App\State $state)
    {
        $this->___init();
        parent::__construct($categoryLinkManagement, $product, $state);
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
