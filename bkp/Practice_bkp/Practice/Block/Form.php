<?php

namespace Magento\Practice\Block;

use Magento\Framework\View\Element\Template;
use Magento\Backend\Block\Template\Context;
use Magento\Practice\Model\PracticeFactory;


class Form extends Template
{
    public function __construct(
        Context $context,
        PracticeFactory $practiceFactory,
        array $data = [])
    {
        parent::__construct($context, $data);
        $this->practiceFactory = $practiceFactory;
    }

    public function getFormAction()
    {
        return $this->getUrl('practice/index/submit', ['_secure' => true]);
    }

    public function getAllData()
    {
        $id = $this->getRequest()->getParam("id");
        $model = $this->practiceFactory->create();
        return $model->load($id);
    }
}