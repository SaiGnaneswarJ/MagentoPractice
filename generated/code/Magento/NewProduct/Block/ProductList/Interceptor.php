<?php
namespace Magento\NewProduct\Block\ProductList;

/**
 * Interceptor class for @see \Magento\NewProduct\Block\ProductList
 */
class Interceptor extends \Magento\NewProduct\Block\ProductList implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Catalog\Block\Product\Context $context, \Magento\Framework\Url\Helper\Data $urlHelper, \Magento\Catalog\Model\ProductFactory $productloader, \Magento\Framework\Data\Form\FormKey $formKey, array $data = [])
    {
        $this->___init();
        parent::__construct($context, $urlHelper, $productloader, $formKey, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getImage($product, $imageId, $attributes = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getImage');
        return $pluginInfo ? $this->___callPlugins('getImage', func_get_args(), $pluginInfo) : parent::getImage($product, $imageId, $attributes);
    }
}
