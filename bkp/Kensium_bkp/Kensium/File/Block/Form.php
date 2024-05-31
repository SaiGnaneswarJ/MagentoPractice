<?php

namespace Kensium\File\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;


class Form extends Template
{
    public function __construct(
        Context $context,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }


    public function getTemplate()
    {
        return 'Kensium_File::form.phtml';
    }
}
