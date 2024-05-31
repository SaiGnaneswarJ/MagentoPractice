<?php

namespace Magento\Practice\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Practice\Model\PracticeFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Delete extends Action
{
    protected $resultPageFactory;
    protected $practiceFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        PracticeFactory $practiceFactory
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->practiceFactory = $practiceFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $data = (array)$this->getRequest()->getParams();
            if (isset($data['id'])) {
                $model = $this->practiceFactory->create()->load($data['id']);
                $model->delete();
                $this->messageManager->addSuccessMessage(__("Record Deleted Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__("We can't delete the record, Please try again."));
        }

        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('practice/index/showdata');

        return $resultRedirect;
    }
}
