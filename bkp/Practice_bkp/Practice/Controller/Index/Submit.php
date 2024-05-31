<?php

namespace Magento\Practice\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Practice\Model\PracticeFactory;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Submit extends Action
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
            $data = (array)$this->getRequest()->getPost();
            if ($data) {
                $model = $this->practiceFactory->create();
                $model->setData($data)->save();

                // Dispatch custom event after saving data
                $this->_eventManager->dispatch('custom_form_submit_event', ['data' => $data]);

                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can't submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('practice/index/showdata');
        return $resultRedirect;
    }
}
