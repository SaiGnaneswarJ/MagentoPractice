<?php
namespace Magento\Customer\Ui\Component\Listing\Columns;

/**
 * Interceptor class for @see \Magento\Customer\Ui\Component\Listing\Columns
 */
class Interceptor extends \Magento\Customer\Ui\Component\Listing\Columns implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\View\Element\UiComponent\ContextInterface $context, \Magento\Customer\Ui\Component\ColumnFactory $columnFactory, \Magento\Customer\Ui\Component\Listing\AttributeRepository $attributeRepository, \Magento\Customer\Ui\Component\Listing\Column\InlineEditUpdater $inlineEditor, array $components = [], array $data = [], array $filterConfigProviders = [])
    {
        $this->___init();
        parent::__construct($context, $columnFactory, $attributeRepository, $inlineEditor, $components, $data, $filterConfigProviders);
    }

    /**
     * {@inheritdoc}
     */
    public function prepareDataSource(array $dataSource)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'prepareDataSource');
        return $pluginInfo ? $this->___callPlugins('prepareDataSource', func_get_args(), $pluginInfo) : parent::prepareDataSource($dataSource);
    }
}
