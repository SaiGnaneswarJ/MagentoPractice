<?php
namespace Magento\Demo\Console\Command\AddData;

/**
 * Interceptor class for @see \Magento\Demo\Console\Command\AddData
 */
class Interceptor extends \Magento\Demo\Console\Command\AddData implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Demo\Model\DemoFactory $DemoFactory)
    {
        $this->___init();
        parent::__construct($DemoFactory);
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
