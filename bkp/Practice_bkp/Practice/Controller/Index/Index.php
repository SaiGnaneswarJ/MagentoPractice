<?php

namespace Magento\Practice\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Practice\Model\PracticeFactory;

class Index extends Action
{
    protected $resultPageFactory;

    private $practiceFactory;

    private $url;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        UrlInterface $url,
        PracticeFactory $practiceFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->practiceFactory = $practiceFactory;
        $this->url = $url;
    }

    public function execute()
    {
        if ($this->isCorrectData()) {
            return $this->resultPageFactory->create();
        } else {
            $this->messageManager->addErrorMessage(__("Record Not Found"));
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            $resultRedirect->setPath('practice/index/showdata');
            return $resultRedirect;
        }
    }

    public function isCorrectData()
    {
        if ($id = $this->getRequest()->getParam("id")) {
            $model = $this->practiceFactory->create();
            $model->load($id);
            if ($model->getId()) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}
